<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function connect_database(){
    global $pdo;

    $dsn = "mysql:host=localhost;dbname=project";
    $username_db = "root";
    $password_db = "root";

    try{
        $pdo = new PDO($dsn, $username_db, $password_db);
    }catch(PDOException $e){
        die("Connecting Error". $e->getMessage());
    }

    #echo "<br>Connected to Database.<br>";

    return;

}

function create_table(){
    global $pdo;

    $sql = "CREATE TABLE IF NOT EXISTS registration_table(
        id INT(7) NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY(id))";

    $statement = $pdo->prepare($sql);

    if($statement->execute()){
        #echo "<br>Data inserted succesfully<br>";
    }else{
        echo "<br>Error exectuning the statement<br>" . $statement->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS best_game(
        id INT(7) NOT NULL AUTO_INCREMENT,
        best_game VARCHAR(255) NOT NULL,
        FOREIGN KEY(id) REFERENCES registration_table(id))";

    $statement=$pdo->prepare($sql);

    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error Connecting: ' . $e->getMessage());
    }

    $sql = "CREATE TABLE IF NOT EXISTS fav_color(
        id INT(7) NOT NULL AUTO_INCREMENT,
        color VARCHAR(255) NOT NULL,
        FOREIGN KEY(id) REFERENCES registration_table(id))";

    $statement=$pdo->prepare($sql);

    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error Connecting: ' . $e->getMessage());
    }
}

function user_exist($username, $password){
    if(isset($username)){
        global $pdo;

        $sql = "SELECT password FROM registration_table WHERE username=?";
        
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1,$username);

        try{
            $statement->execute();
        }catch(PDOException $e){
            die('Error executing query' . $e->getMessage());
        }

        $info = $statement->fetch();

        $pwdHashed = $info['password'];

        if($pwdHashed == null){
            echo "<br>Account doesn't exist in our database<br>";
            return false;
        }else{
            echo "<br>Account Already Exist<br>";
            return true;
        }

    }
}

function correct_password($username, $password){
    if(isset($username)){
        global $pdo;

        $sql = "SELECT password FROM registration_table WHERE username=?";
        
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1,$username);

        try{
            $statement->execute();
        }catch(PDOException $e){
            die('Error executing query' . $e->getMessage());
        }

        $info = $statement->fetch();

        $pwdHashed = $info['password'];

        if(password_verify($password, $pwdHashed)){
            return true;
        }else{
            return false;
        }

    }

}

function check_password($password){
    if((strlen($password) >= 7 && strlen($password) <= 12)){
        if($password != strtolower($password)){
            echo "<br>password meets requirements.<br>";
            return true;
        }else{
            echo "<br>password doesn't meet requirements. <b>(At Least One Upper-case Letter)</b><br>";
            return false;
        }
        
    }else{
        echo "<br>password doesn't meet requirements. <b>(Between 7-12 Characters)</b><br>";
        return false;
    }
}

function insert_user($username, $password){
    global $pdo;

    $sql="INSERT INTO registration_table(username,password) VALUES(:username,:password)";
    $statement=$pdo->prepare($sql);
    
    $pwdHashed=password_hash($password,PASSWORD_BCRYPT);
    
    $statement->bindParam(':username',$username);
    $statement->bindParam(':password',$pwdHashed);
    
    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }

    $sql = "INSERT INTO best_game(best_game) VALUES (:best_game)";
        $statement = $pdo->prepare($sql);
        $game = "placeholder";
        $statement->bindParam(":best_game", $game);

    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error Connecting: ' . $e->getMessage());
    }

    $sql = "INSERT INTO fav_color(color) VALUES (:color)";
        $statement = $pdo->prepare($sql);
        $color = "placeholder";
        $statement->bindParam(":color", $color);

    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error Connecting: ' . $e->getMessage());
    }

    echo "<br>Account Created<br>";
}

function update_user($username, $password){
    global $pdo;
    $sql = "UPDATE registration_table SET password=:new_password WHERE username=:username";

    $statement = $pdo->prepare($sql);

    $pwdHashed=password_hash($password,PASSWORD_BCRYPT);
    
    $statement->bindParam(':username',$username);
    $statement->bindParam(':new_password',$pwdHashed);
    
    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }
}

function delete_user($username){
    global $pdo;

    $sql = "SELECT id FROM registration_table WHERE username=:username";

    $statement = $pdo->prepare($sql);
    
    $statement->bindParam(':username',$username);
    
    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }

    $info = $statement->fetch();

    $sql = "DELETE FROM best_game WHERE id=:id";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $info['id']);

    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }

    $sql = "DELETE FROM fav_color WHERE id=:id";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $info['id']);

    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }

    $sql = "DELETE FROM registration_table WHERE username=:username";

    $statement = $pdo->prepare($sql);
    
    $statement->bindParam(':username',$username);
    
    try{
        $statement->execute();
    }catch(PDOException $e){
        die('Error executing query' . $e->getMessage());
    }
}

function display_table(){
    echo "<table class='w3-table w3-border w3-centered'>";
    echo "<tr class='w3-black'><th>Username</th><th>Password</th><th>Best Game</td><td>Favorite Color</td></tr>";
    try{connect_database();
    create_table();
    global $pdo;
    $sql = "SELECT username, password, best_game, color FROM registration_table, best_game, fav_color WHERE registration_table.id = best_game.id AND best_game.id = fav_color.id;";
    $statement = $pdo->query($sql);
    $result = $statement->fetchall();
    foreach ($result as $user){
        echo '<tr class="w3-white w3-border"><td>' . $user['username'] . '</td><td>**************</td><td>' . $user['best_game'] . '</td><td>' . $user['color'] .'</tr>';
    }    
    echo "</table><br>";
    }catch(PDOException $e){
        echo 'Connection Failed: ' . $e->getMessage();
    }
}

?>