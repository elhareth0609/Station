<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WebSocketServer extends Command
{
    protected $signature = 'websocket:serve';
    protected $description = 'Start the WebSocket server';

    private $socket;
    private $clients = [];
    private $host = '127.0.0.1';
    private $port = 4444;

    public function __construct()
    {
        parent::__construct();
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            die("Socket creation failed: " . socket_strerror(socket_last_error()));
        }

        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1);

        if (!socket_bind($this->socket, $this->host, $this->port)) {
            die("Socket bind failed: " . socket_strerror(socket_last_error()));
        }

        if (!socket_listen($this->socket)) {
            die("Socket listen failed: " . socket_strerror(socket_last_error()));
        }

        socket_set_nonblock($this->socket);

        // Check for output before using it
        if ($this->output) {
            $this->info("WebSocket Server started on ws://{$this->host}:{$this->port}");
        } else {
            echo "WebSocket Server started on ws://{$this->host}:{$this->port}\n";
        }
    }

    public function handle()
    {
        while (true) {
            $changed = array_merge([$this->socket], $this->clients);
            $null = null;

            if (socket_select($changed, $null, $null, 0) === false) {
                continue;
            }

            if (in_array($this->socket, $changed)) {
                $client = socket_accept($this->socket);
                if ($client !== false) {
                    socket_set_nonblock($client);
                    $this->clients[] = $client;

                    $header = '';
                    do {
                        $buffer = socket_read($client, 1024);
                        $header .= $buffer;
                    } while ($buffer != '' && strpos($header, "\r\n\r\n") === false);

                    $this->performHandshake($header, $client);

                    // Check for output before using it
                    if ($this->output) {
                        $this->info("New client connected");
                    } else {
                        echo "New client connected\n";
                    }
                }
            }

            foreach ($changed as $key => $socket) {
                if ($socket == $this->socket) {
                    continue;
                }

                $buffer = @socket_read($socket, 1024);
                if ($buffer === false || $buffer === '') {
                    if (socket_last_error($socket) != SOCKET_EAGAIN) {
                        $this->removeClient($socket);
                    }
                    continue;
                }

                $decodedData = $this->decode($buffer);
                if ($decodedData !== false) {
                    // Check for output before using it
                    if ($this->output) {
                        $this->info("Server received message: " . $decodedData);
                    } else {
                        echo "Server received message: " . $decodedData . "\n";
                    }

                    // Echo back to sender
                    $this->send($socket, $decodedData);

                    // Broadcast to other clients
                    foreach ($this->clients as $client) {
                        if ($client !== $socket) {
                            $this->send($client, $decodedData);
                        }
                    }
                }
            }

            usleep(10000); // Reduce CPU usage
        }
    }

    private function decode($buffer)
    {
        // Decode WebSocket frame
        $length = ord($buffer[1]) & 127;
        if ($length == 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8, $length);
        } elseif ($length == 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14, $length);
        } else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6, $length);
        }

        $text = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $text .= $data[$i] ^ $masks[$i % 4];
        }
        return $text;
    }

    private function send($client, $message)
    {
        $header = chr(129) . chr(strlen($message));
        $msg = $header . $message;
        socket_write($client, $msg, strlen($msg));

        // Check for output before using it
        if ($this->output) {
            $this->info("Server sent message: " . $message);
        } else {
            echo "Server sent message: " . $message . "\n";
        }
    }

    private function removeClient($socket)
    {
        $index = array_search($socket, $this->clients);
        if ($index !== false) {
            unset($this->clients[$index]);
            socket_close($socket);

            // Check for output before using it
            if ($this->output) {
                $this->info("Client disconnected");
            } else {
                echo "Client disconnected\n";
            }
        }
    }

    private function performHandshake($header, $client)
    {
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $header, $match)) {
            $key = base64_encode(pack('H*', sha1($match[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
            $headers = "HTTP/1.1 101 Switching Protocols\r\n";
            $headers .= "Upgrade: websocket\r\n";
            $headers .= "Connection: Upgrade\r\n";
            $headers .= "Sec-WebSocket-Accept: $key\r\n\r\n";
            socket_write($client, $headers, strlen($headers));
            return true;
        }
        return false;
    }
}