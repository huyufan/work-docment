<?php

const PERMISSION_CREATE_USER = 1;
const PERMISSION_UPDATE_USER = 2;
const PERMISSION_DELETE_USER = 3;
const PERMISSION_FETCH_USER = 4;
const PERMISSION_LIST_USERS = 5;

function login($username, $password) {
    if ($username === "admin" && $password == "admin") {
        return [
            "username" => $username,
            "password" => $password,
            "login_time" => time(),
            "roles" => ["god"],
            "permissions" => [
                PERMISSION_CREATE_USER,
                PERMISSION_UPDATE_USER,
                PERMISSION_DELETE_USER,
                PERMISSION_FETCH_USER,
                PERMISSION_LIST_USERS]
        ];
    }
    return "username or password is incorrect.";
}

function hello($name, $session) {
    if (in_array("god", $session["roles"])) {
        return "hello god!!!";
    } 
    else {
        return "hello $name!";
    }
}

function delete_user($username, $session) {
    if (in_array(PERMISSION_DELETE_USER, $session["permissions"])) {
        return "delete user $username success!";
    } 
    else {
        return "you have no permission to delete user.";
    }
}

