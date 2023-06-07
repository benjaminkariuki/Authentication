<?php

require_once('Config.php');
require_once('User.php');


$user = new User($con, $_SESSION["userLoggedIn"]); 

?>


<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome  <?php echo $_SESSION["userLoggedIn"]; ?></h2>
        <?php
        $imageData = base64_encode($user->getProfilePicture());
        echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Profile Picture" class="profile_pic">';
        ?>
        
    </div>
</body>
</html>
