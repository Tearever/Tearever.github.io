<?php
include 'function.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] =="POST"){
    if (isset($_POST['submit_action'])) {
        $action = $_POST['submit_action'];

        
        switch ($action) {
            case 'ADD':
                header("Location: add.php");
                break;
                
            case 'UPDATE':
                
                header("Location: update.php");
                break;

            case 'DELETE':
                
                header("Location: delete.php");
                break;

            default:
                echo "Invalid action received.";
        }

    }
}


?>