<?php

class Database {

    private $connect;

    public function connect() {
        //return mysqli_connect('localhost', 'root', '', 'todo');
        return $this->$connect = new mysqli('localhost', 'root', '121212Err', 'todo');
    }

    public function disconnect() {
        return $this->$connect->close();
    }

    public function Request($request) {
        return $this->$connect->query($request);
    }

    public function checkUser($username) {
        $result = $this->Request("SELECT * FROM `users` WHERE `username` = '$username'");

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($username, $password) {
        return $this->Request("INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')");
    }

    public function checkPassword($username, $password) {
        $result = $this->Request("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function real($string) {
        return $this->$connect->real_escape_string($string);
    }
}