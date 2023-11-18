<?php
session_start();

if($_SESSION['username'] == null){
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
    <title>Last Page</title>
</head>
<body>
<div class="w3-bar w3-black w3-large">
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  <a href="Homepage.php" class="w3-bar-item w3-button">The Breakdown</a>
  <a href="best_game_of_all_time.php" class="w3-bar-item w3-button">Best Game</a>
  <a href="last.php" class="w3-bar-item w3-button">Last Page</a>
</div>
<div class="w3-container w3-black" style="padding:1px 16px">
<h1 class="w3-center w3-wide w3-white" style="text-shadow:30px 30px 0 #777">Choose Your Favorite Number</h1><br>
<div class="w3-center">
<form action="processing/last_processing.php" method="POST">
  <br><br>
  <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
  <input type="submit" value="Submit" class="w3-button w3-white">
  <h2 class="w3-center w3-wide">What Your Favorite Color Says About You and Your Personality</h2>
  <h3 class="w3-blue">People who gravitate toward the color blue are charming, friendly, and emotional.</h3>
  <h3 class="w3-win8-red">Lovers of red are overall positive, loving people.</h3>
  <h3 class="w3-pink">Those who have a favorite color of pink are rather sensitive.</h3>
  <h3 class="w3-green">People who love green are loyal and supportive.</h3>
  <h3 class="w3-win8-orange">Those who adore a bright orange color are seen as warm and inviting.</h3>
  <h3 class="w3-yellow">Those who admire yellow are upbeat, good-natured, and a breath of fresh air.</h3>
  <h3>People who prefer black have a flair for entrepreneurship and they’re a natural at commanding an audience.</h3>
  <h3 class="w3-grey">Gray is believed to be a peculiar color, which is why those who like it are a little odd themselves.</h3>
  <h3 class="w3-white">People who fancy white have strong convictions.</h3>
  <h3 class="w3-brown">If you consider yourself a brown enthusiast, you’re a person of impressive patience.</h3>
  <h3 class="w3-purple">Those who love purple are intriguing, lovely, and down to earth.</h3>
  <h3 class="w3-aqua">Those who favor turquoise and aqua are courteous, and they’re most prominently known for their empathetic disposition.</h3>
  <h3 class="w3-win8-magenta">If you’re drawn to magenta, you’re an enthusiastic person who enjoys helping other people be the best they can be.</h3>
  <h3 class="w3-win8-indigo">People who love indigo are often deeply intuitive — they are remarkably empathetic and can sense another person’s emotional state.</h3>
  <h3 class="w3-win8-steel">People who are drawn to silver also have an admirable and enviable trait — they aren’t afraid of change.</h3>
  <h3 class="w3-win8-yellow">Those who favor gold tend to be loyal, dependable people who are also highly organized.</h3>
</form>
</div>
</div>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    &copy; <?php echo $year = date('Y'); ?> Trevor Wright
</footer>
</html>