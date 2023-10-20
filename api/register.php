<?php

require_once './api/database.php';

$username = $data['username'];
$password = md5($data['password']);


$db = new Database();

$db->connect();

$protectedUsername = $db->real($username);

if ($db->checkUser($protectedUsername)) {
    return json_encode(false);
} else {
    session_start();
    $_SESSION['username'] = $username;
    setcookie('username', $username, time() + 3600);
    $db->addUser($protectedUsername, $password);
    return json_encode(true);
}

$db->disconnect();