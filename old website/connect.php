<?php

INCLUDE 'function.php';

if($_SERVER["REQUEST_METHOD"] =="POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    connect_database();
    user_exist($username, $password);
}

?>