<?php
require_once('Config.php');
require_once('Authentication.php');

$auth = new Authentication($con);

if (isset($_POST['login'])) {
    // Retrieve form input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    $success =  $auth->LoginUser($username,$password);

    if($success==true){

        $_SESSION["userLoggedIn"] = $username;
          header("Location: index.php");
      }

}



?>


<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <?php   echo $auth->getError("Login Failed");   ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
        <a href="register.php" class="">Need an account? Sign up here!</a>
    </div>
</body>
</html>
