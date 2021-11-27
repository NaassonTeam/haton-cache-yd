<?php

use Ratchet\Server\IoServer;
use ServerWS\ServerWS;

require dirname(__DIR__) . '/vendor/autoload.php';

$server = IoServer::factory(
    new ServerWS(),
    8080
);

$server->run();
