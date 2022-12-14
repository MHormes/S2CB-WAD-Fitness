<?php
session_start();
global $isLoggedIn;

include '../includes/user_template.php';
if (isset($_POST['btnLogin'])) {
    loginAccount($_POST["username"], $_POST["password"]);
    exit;
}
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
    <link rel="stylesheet" type="text/css" href="../resources/css/snackbar.css">
</head>

<body>
    <div class="grid-container">
        <div class="header" onClick='location.href = "index.php";'>AM Fitness</div>
        <a href="contact.php">
            <div class="navi">Contact</div>
        </a>
        <a href="workoutPage.php">
            <div class="navi">Pre-made workouts</div>
        </a>
        <a href="categories.php">
            <div class="navi">Categories</div>
        </a>
        <a href="mypage.php">
            <div class="navi">My page</div>
        </a>
    </div>
    <!-- contact form -->
    <section class="login-form">
        <div class="row">
            <h2>Login</h2>
        </div>
        <div class="row">
            <form method="post" action="#" class="login-form">
                <!-- inserting username, password -->
                <div class="row">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username" required>
                </div>
                <div class="row">
                    <label for="pwd">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" required>
                </div>
                <div class="row">
                    <input type="submit" value="Login" name="btnLogin">
                </div>
                <a href="registration.php">
                    <div class="row">
                        <input type="button" value="Sign up">
                    </div>
                </a>
            </form>

            <!-- The actual snackbar -->
            <div id="snackbar"><?php echo $_COOKIE['loginMessage']; ?></div>
            <div id="snackbarReg"><?php if(isset($_SESSION['UsernameReg'])){echo "Thank you for creating an account. You can now login using the password for account: " . $_SESSION['UsernameReg']; } ?></div>
            <script src="../JavaScript/snackbar.js"></script>

            <?php
            if (isset($_COOKIE['loginMessage'])) {
                echo '<script type="text/javascript">showSnackbar();</script>';
                unset($_SESSION['loginMessage']);
            }
            
            if (isset($_SESSION["UsernameReg"])) {
                echo '<script type="text/javascript">showSnackbarReg();</script>';
                unset($_SESSION['UsernameReg']);
            }
            
            ?>
        </div>
    </section>
</body>

</html>