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
  <a href="index.php" class="w3-bar-item w3-button">Logout</a>
  <a href="Homepage.php" class="w3-bar-item w3-button">The Breakdown</a>
  <a href="best_game_of_all_time.php" class="w3-bar-item w3-button">Best Game</a>
  <a href="last.php" class="w3-bar-item w3-button">Last Page</a>
</div>

<div class="w3-container w3-grey w3-center" style="padding:128px 16px">
    <div class="w3-bar w3-round-xxlarge w3-green w3-text-black w3-small"><p>You have succesfully login into your account. You know have access to the rest of the website</p></div>
<div>
    <br><a href="Homepage.php" class="w3-btn w3-round-xxlarge w3-white">Go to The Breakdown</a>
</div>
</div>   
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    &copy; <?php echo $year = date('Y'); ?> Trevor Wright
</footer>
</html>