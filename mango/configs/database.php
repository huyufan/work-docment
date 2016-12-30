<?php

$config = array(
    'master' => array(
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => '111111',
        'dbname' => 'test'
    ),
    'slave' => array(
        'slave1' => array(
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '111111',
            'dbname' => 'test'
        ),
        'slave2' => array(
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '111111',
            'dbname' => 'test'
        ),
    )
);
return $config;
