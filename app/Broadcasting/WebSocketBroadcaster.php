<?php

namespace App\Broadcasting;

use Illuminate\Broadcasting\Broadcasters\Broadcaster;
use Illuminate\Broadcasting\BroadcastException;

class WebSocketBroadcaster extends Broadcaster {
    protected $host;
    protected $port;

    public function __construct($host, $port) {
        $this->host = $host;
        $this->port = $port;
    }

    public function broadcast(array $channels, $event, array $payload = []) {
        $message = json_encode([
            'type' => 'message',
            'channel' => $channels[0],
            'message' => $payload['message'],
        ]);

        // Send the message to the WebSocket server
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            throw new BroadcastException('Could not create socket.');
        }

        $result = socket_connect($socket, $this->host, $this->port);
        if ($result === false) {
            throw new BroadcastException('Could not connect to WebSocket server.');
        }

        socket_write($socket, $message, strlen($message));
        socket_close($socket);

        return true;
    }

    public function auth($request) {
        // Implement authentication logic if needed
    }

    public function validAuthenticationResponse($request, $result) {
        // Implement validation logic if needed
    }
}