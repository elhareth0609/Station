<?php

namespace App\Providers;

use App\Broadcasting\WebSocketBroadcaster;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        // Broadcast::extend('websockets', function ($app) {
        //     return new class {
        //         public function broadcast(array $channels, $event, array $payload = []) {
        //             $message = json_encode([
        //                 'type' => 'message',
        //                 'channel' => $channels[0],
        //                 'message' => $payload['message'],
        //             ]);

        //             // Send the message to the WebSocket server
        //             $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        //             if ($socket === false) {
        //                 return false;
        //             }

        //             $result = socket_connect($socket, '127.0.0.1', 4444);
        //             if ($result === false) {
        //                 return false;
        //             }

        //             socket_write($socket, $message, strlen($message));
        //             socket_close($socket);

        //             return true;
        //         }
        //     };
        // });
        // Broadcast::extend('websockets', function ($app, $config) {
        //     return new WebSocketBroadcaster($config['host'], $config['port']);
        // });

    }
}
