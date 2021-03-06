<?php

use Ratchet\Server\IoServer;
use ServerWS\ServerWS;
use ServerWS\Pusher;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

use \ZMQContext;
use \ZMQ;

require 'vendor/autoload.php';

$loop   = React\EventLoop\Factory::create();
$pusher = new Pusher();

// Listen for the web server to make a ZeroMQ push after an ajax request
// $context = new React\ZMQ\Context($loop);
$context = new ZMQContext($loop);
$pull = $context->getSocket(ZMQ::SOCKET_PULL);
$pull->bind('tcp://127.0.0.1:5555'); // Binding to 127.0.0.1 means the only client that can connect is itself
$pull->on('message', array($pusher, 'onBlogEntry'));

// Set up our WebSocket server for clients wanting real-time updates
$webSock = new React\Socket\Server('0.0.0.0:8080', $loop); // Binding to 0.0.0.0 means remotes can connect
$webServer = new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
            new Ratchet\Wamp\WampServer(
                $pusher
            )
        )
    ),
    $webSock
);

$loop->run();
