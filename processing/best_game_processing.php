<?php
session_start();
include 'function.php';

if($_SERVER["REQUEST_METHOD"] =="POST"){

    $game = $_POST['game'];

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

    echo $info['id'];

    $sql = "UPDATE best_game SET best_game=:best_game WHERE id=:id";

    $statement = $pdo->prepare($sql);

    $statement->bindParam(":best_game", $game);
    $statement->bindParam(":id", $info['id']);

    try{
        $statement->execute();
        header("Location: ../best_game_of_all_time.php");
        exit();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }

}

?>