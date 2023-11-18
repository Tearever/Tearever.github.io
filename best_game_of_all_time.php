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
    <title>Best Game</title>
</head>
<body>
<div class="w3-bar w3-black w3-large">
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  <a href="Homepage.php" class="w3-bar-item w3-button">The Breakdown</a>
  <a href="best_game_of_all_time.php" class="w3-bar-item w3-button">Best Game</a>
  <a href="last.php" class="w3-bar-item w3-button">Last Page</a>
</div>

<div class="w3-container w3-black w3-center" style="padding:1px 16px">
<h1 class="w3-center w3-wide w3-white" style="text-shadow:30px 30px 0 #777">Best Game of All Time</h1><br><br>
<form action ="processing/best_game_processing.php" method = "POST">
  <table class="w3-table w3-black w3-border w3-centered">
    <tr>
      <td><img src="images/BOTW.png" style="max-width:350px"></td>
      <td><img src="images/RDR2.png" style="max-width:350px"></td>
      <td><img src="images/HF2.png" style="max-width:350px"></td>
      <td><img src="images/BS.png" style="max-width:350px"></td>
      <td><img src="images/MGS.png" style="max-width:350px"></td>
    </tr>
    <tr>
      <td><label for="BOTW">The Legend of Zelda: Breath of the Wild</label><br><input type="radio" name="game" value="BOTW"></td>
      <td><label for="RDR2">Red Dead Redemption 2</label><br><input type="radio" name="game" value="RDR2"></td>
      <td><label for="HL2">Half-Life 2</label><br><input type="radio" name="game" value="HL2"></td>
      <td><label for="BS">BioShock</label><br><input type="radio" name="game" value="BS"></td>
      <td><label for="MGS">Metal Gear Solid</label><br><input type="radio" name="game" value="MGS"></td>
    </tr>
    <tr>
      <td><img src="images/minecraft.png" style="max-width:350px"></td>
      <td><img src="images/skyrim.png" style="max-width:350px"></td>
      <td><img src="images/ff7.png" style="max-width:350px"></td>
      <td><img src="images/Hades.png" style="max-width:350px"></td>
      <td><img src="images/Gold.png" style="max-width:350px"></td>
    </tr>
    <tr>
      <td><label for="minecraft">Minecraft</label><br><input type="radio" name="game" value="minecraft"></td>
      <td><label for="skyrim">The Elder Scrolls V: Skyrim</label><br><input type="radio" name="game" value="skyrim"></td>
      <td><label for="ff7">Final Fantasy VII</label><br><input type="radio" name="game" value="ff7"></td>
      <td><label for="Hades">Hades</label><br><input type="radio" name="game" value="Hades"></td>
      <td><label for="Gold">GoldenEye 007</label><br><input type="radio" name="game" value="Gold"></td>
    </tr>
    <tr>
      <td><img src="images/blood.png" style="max-width:350px"></td>
      <td><img src="images/undertale.png" style="max-width:350px"></td>
      <td><img src="images/SF2.png" style="max-width:350px"></td>
      <td><img src="images/GOW.png" style="max-width:350px"></td>
      <td><img src="images/H2.png" style="max-width:350px"></td>
    </tr>
    <tr>
      <td><label for="blood">Bloodborne</label><br><input type="radio" name="game" value="blood"></td>
      <td><label for="undertale">Undertale</label><br><input type="radio" name="game" value="undertale"></td>
      <td><label for="SF2">Street Fighter II</label><br><input type="radio" name="game" value="SF2"></td>
      <td><label for="GOW">God of War</label><br><input type="radio" name="game" value="GOW"></td>
      <td><label for="H2">Halo 2</label><br><input type="radio" name="game" value="H2"></td>
    </tr>
  </table>
  <br><br>
<input type="submit" value="submit" class="w3-button w3-white w3-xlarge w3-cursive">
<br><br>
</form>

</div>   
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    &copy; <?php echo $year = date('Y'); ?> Trevor Wright
</footer>
</html>