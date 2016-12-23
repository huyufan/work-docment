<?php
require_once "vendor/autoload.php";
require_once "ServerSessionHandler.php";
require_once "myservice.php";

use Hprose\Http\Server;

$server = new Server();
$server->debug = true;
$server->addInvokeHandler([new ServerSessionHandler(), 'handler']);
$server->addFunctions(['login', 'hello', 'delete_user']);
$server->start();
