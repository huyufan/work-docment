<?php

class ClientSessionHandler {
    private $token;
    public function handler($name, array &$args, $context, $next) {
        if ($name == "login") {
            $response = $next($name, $args, $context);
            if (array_key_exists("token", $response)) {
                $this->token = $response['token'];
                return true;
            }
            return $response;
        }
        array_push($args, $this->token);
        return $next($name, $args, $context);
    }
    public function asynchandler($name, array &$args, $context, $next) {
        if ($name == "login") {
            $response = yield $next($name, $args, $context);
            if (array_key_exists("token", $response)) {
                $this->token = $response['token'];
                return true;
            }
            return $response;
        }
        array_push($args, $this->token);
        return $next($name, $args, $context);
    }
}