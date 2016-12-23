<?php
require_once "vendor/autoload.php";
require_once "ClientSessionHandler.php";

use Hprose\Client;

$client = Client::create('http://127.0.0.1:8080/', false);
$client->addInvokeHandler([new ClientSessionHandler(), 'handler']);
var_dump($client->login("andot", "admin"));
var_dump($client->hello("world"));
var_dump($client->login("admin", "admin"));
var_dump($client->hello("world"));
var_dump($client->delete_user("andot"));
