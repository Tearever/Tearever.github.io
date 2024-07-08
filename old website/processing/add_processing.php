<?php
include "function.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] =="POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    connect_database();
    create_table();
    if(!user_exist($username,$password) && check_password($password)){
        insert_user($username, $password);
        header("Location: ../admin.php");
        exit();
    }
    else{
        header("Location: admin_failure.php");
        exit();
    }
}



?>