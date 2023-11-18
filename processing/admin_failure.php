<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login Page</title>
</head>
<body>
<div class="w3-bar w3-black w3-large">
  <a href="../index.php" class="w3-bar-item w3-button">Sign In</a>
  <a href="../Homepage.php" class="w3-bar-item w3-button">The Breakdown</a>
  <a href="../best_game_of_all_time.php" class="w3-bar-item w3-button">Best Game</a>
  <a href="../last.php" class="w3-bar-item w3-button">Last Page</a>
</div>

<div class="w3-container w3-grey w3-center" style="padding:128px 16px">
<?php
    include 'function.php';
    try{
        display_table();
    }catch(PDOException $e){
        echo 'Connection Failed: ' . $e->getMessage();
    }
?>
<form action="admin_processing.php" method="POST">
    <input type="submit" name="submit_action" value="ADD" class="w3-border w3-border-black">
    <input type="submit" name="submit_action" value="UPDATE" class="w3-border w3-border-black">
    <input type="submit" name="submit_action" value="DELETE" class="w3-border w3-border-black">
</form>
<p class="w3-bar w3-red w3-round w3-text-black w3-large">No changes were made to the database</p>
</div>   
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    &copy; <?php echo $year = date('Y'); ?> Trevor Wright
</footer>
</html>