<?php

use Ratchet\Server\IoServer;
use ServerWS\ServerWS;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ServerWS()
        )
    ),
    8080
);

$server->run();
