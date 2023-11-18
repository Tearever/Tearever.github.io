<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Register Page</title>
</head>
<body>
    <div class="w3-bar w3-black w3-large">
    <a href="index.php" class="w3-bar-item w3-button">Sign In</a>
    <a href="Homepage.php" class="w3-bar-item w3-button">The Breakdown</a>
    <a href="best_game_of_all_time.php" class="w3-bar-item w3-button">Best Game</a>
    <a href="last.php" class="w3-bar-item w3-button">Last Page</a>
    </div>

    <div class="w3-container w3-grey w3-center" style="padding:128px 16px">
    <form action ="processing\register_processing.php" method = "POST">
        <label>Username</label><br>
        <input class="w3-input w3-border w3-round-large" type="text" id="username_style" name="username" required>
        <br>
        <label>Password</label><br>
        <input class="w3-input w3-border w3-round-large" type="password" id="password_style" name="password" required>
        <div class="w3-panel w3-center w3-small">
            <p><b>(Password should have a length between 7-12 character & should contain one capital letter)</b><p>
        </div class="w3-button w3-panel">
        <div class="w3-bar w3-round-xxlarge w3-red w3-text-black w3-small"><p>Either an Account already has the username or the password doesn't meet the requirements</p></div><br></br>
        <input type="submit" class="w3-btn w3-round-xxlarge w3-white" value="Create Account">
    </form>
    </div>
</body>
<footer class="w3-panel w3-center w3-text-gray w3-small">
    &copy; <?php echo $year = date('Y'); ?> Trevor Wright
</footer>
</html>