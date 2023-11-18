<?php
include 'processing/functions.php';
global $pdo;

session_start();

session_unset();

session_destroy();

$pdo = null;
header("Location: index.php");
exit();
?>