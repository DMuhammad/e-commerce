<?php

namespace App\Controllers;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\Chat;

class WebSocketController extends BaseController
{
    public function start()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            8282 // Port yang digunakan untuk WebSocket
        );

        echo "WebSocket server started on port 8282...\n";
        $server->run();
    }
}
