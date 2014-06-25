<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/21/14
 * Time: 4:06 PM
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

require_once '../bootstrap.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Main\Socket\QueDru()
        )
    ),
    8081
);

echo "que socket start...\n";
$server->run();
