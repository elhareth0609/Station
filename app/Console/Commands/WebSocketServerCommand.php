<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Ratchet\App;

class WebSocketServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the WebSocket server';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $app = new App('localhost', 8080);
        $app->route('/chat', new WebSocketServer);
        $app->run();
    }

}
