<?php
session_start();
include 'function.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] =="POST"){
    echo "login_processing!!!!";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == "admin" && $password == "admin"){
        header("Location: ../admin.php");
        exit();
    }

    global $pdo;

    connect_database();
    create_table();
    if(user_exist($username, $password) && correct_password($username, $password)){
        $_SESSION['username'] = $username;
        header("Location: ../success_page.php");
        exit();
    }
    else{
        header("Location: ../failure_page.php");
        exit();
    }
}
              