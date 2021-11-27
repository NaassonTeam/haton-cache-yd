<?php

use Ratchet\Server\IoServer;
use ServerWS\ServerWS;

require 'vendor/autoload.php';

$server = IoServer::factory(
    new ServerWS(),
    8080
);

$server->run();
