<?php
include "function.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] =="POST"){

    $favcolor = $_POST["favcolor"];

    connect_database();
    create_table();

    $sql = "SELECT id FROM registration_table WHERE username=:username";

    $statement = $pdo->prepare($sql);
    
    $statement->bindParam(':username',$_SESSION['username']);
    
    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }

    $info = $statement->fetch();

    $sql = "UPDATE fav_color SET color=:color WHERE id=:id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(":color", $favcolor);
    $statement->bindParam(":id", $info['id']);

    try{
        $statement->execute();
        header("Location: ../last.php");
        exit();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }
}
