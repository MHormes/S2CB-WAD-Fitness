<?php
session_start();
include '../includes/get_user.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fintess website">
        <title>AM Fitness</title>
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/login.css">
    </head>
    <body>
        <div class="grid-container">
            <div class="header" onClick='location.href = "index.php";'>AM Fitness</div>
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="premade.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            <a href="login.php"><div class="navi">Login</div></a>
        </div>
        <?php
        if(isset($_SESSION["Username"])){
            $UserUsername = $_SESSION['Username'];
            $newUser = GetUserDetails($UserUsername);
            echo "Welcome to your own page, " . $_SESSION["Username"]; ?>
            <div class="row">
                <form id="update" method="post" action="mypage.php" class="login-form">
                    <!-- inserting first name, second name, username, password and confirm password -->
                    <div class="row">
                        <label for="fName">First name</label>
                        <input type="text" name="fname" id="fname" value=<?php echo $newUser->fName; ?> required>
                    </div>
                    <div class="row">
                        <label for="lName">Last name</label>
                        <input type="text" name="lname" id="lname" value=<?php echo $newUser->lName; ?> required>
                    </div>
                    <div class="row">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value=<?php echo $newUser->Username; ?> required>
                    </div>
                    <div class="row">
                        <label for="pwd">Password</label>
                        <input type="password" name="password" id="password" value=<?php echo $newUser->Password; ?> required>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="text" pattern="^[A-z0-9._-]+@[A-z0-9._-]+.[a-z]+" name="email" id="email" value=<?php echo $newUser->Email; ?> required>
                    </div>
                    <div class="row">
                        <input type="submit" value="Update" name="btnUpdate">
                    </div>
                </form>
            </div>
        
        <?php
        }
        else{
            echo "To see your page please log-in";
        }
        ?>
    </body>
</html>
