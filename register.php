<?php
require_once('Config.php');
require_once('Authentication.php');

$auth = new Authentication($con);

if (isset($_POST['submitButton'])) {
    // Retrieve form input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    $profilePicName = $_FILES['profile']['name'];
    $profilePicTmp = $_FILES['profile']['tmp_name'];
    $profilePicData = file_get_contents($profilePicTmp);

    $success =  $auth->registerUser($username,$password,$profilePicData);

    if($success){
        $_SESSION["userLoggedIn"] = $username;
          header("Location: Index.php");
      }
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form action="" method="post"  enctype="multipart/form-data">
            <div class="form-group">
            <?php   echo $auth->getError("Username taken");   ?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="profilePic">Profile Picture:</label>
                <input type="file" id="profilePic" name="profile" accept="image/*" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submitButton" value="Register">
            </div>
        </form>
        <a href="login.php" class="">Already have an account? Sign in here!</a>
    </div>
</body>
</html>
