<?php

class ServerSessionHandler {
    const SESSION_TIMEOUT = 600;
    public function createToken($username, $password) {
        return hash("tiger192,4", "$username:$password " . microtime()) . bin2hex(random_bytes(8));
    }
    public function handler($name, array &$args, $context, $next) {
        if ($name == "login") {
            $response = yield $next($name, $args, $context);
            if (is_array($response)) {
                $token = $this->createToken($args[0], $args[1]);
                $response['last_access_time'] = time();
                file_put_contents("session/$token.txt", hprose_serialize($response));
                return ["token" => $token];
            }
            return ["error" => $response];
        }
        if (count($args) == 0) {
            return ["error" => "illegal call"];
        }
        $token = $args[count($args) - 1];
        $session_file = "session/$token.txt";
        if (!file_exists($session_file)) {
            return ["error" => "illegal call"];
        }
        $session = hprose_unserialize(file_get_contents($session_file));
        if (!is_array($session)) {
            return ["error" => "illegal call"];
        }
        if (time() - $session["last_access_time"] > self::SESSION_TIMEOUT) {
            return ["error" => "session has expired"];
        }
        $args[count($args) - 1] = $session;
        $response = yield $next($name, $args, $context);
        $session = $args[count($args) - 1];
        $session["last_access_time"] = time();
        file_put_contents($session_file, hprose_serialize($session));
        return $response;
    }
}