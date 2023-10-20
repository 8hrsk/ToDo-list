<?php

require_once './api/database.php';

$username = $data['username'];
$password = md5($data['password']);

$db = new Database();

$db->connect();

$protectedUsername = $db->real($username);

if ($db->checkUser($protectedUsername)) {

    if ($db->checkPassword($protectedUsername, $password) == true) {
        session_start();
        $_SESSION['username'] = $username;
        setcookie('username', $username, time() + 3600);
        return json_encode('hi');
    } else {
        return json_encode('Inalid username or password');
    }

} else {
    return json_encode('Inalid username or password');
}

return json_encode('error');

$db->disconnect();