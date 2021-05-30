<?php
session_start();
include '../includes/user_template.php';
if (isset($_POST['btnRegister'])) {
    if(CreateAccount($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password'], $_POST['email']) == false){
        header("Refresh:0");
    }
    exit();
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

</head>

<body>

    <?php include "../resources/navigation.php"; ?>
    <!-- contact form -->
    <section class="login-form">
        <div class="row">
            <h2>Sign up</h2>
        </div>
        <div class="row">
            <form id="register" method="post" action="registration.php" class="login-form">
                <!-- inserting first name, second name, username, password and confirm password -->
                <div class="row">
                    <label for="fName">First name</label>
                    <input type="text" name="fname" id="fname" placeholder="Enter first name" required>
                </div>
                <div class="row">
                    <label for="lName">Last name</label>
                    <input type="text" name="lname" id="lname" placeholder="Enter last name" required>
                </div>
                <div class="row">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username" required>
                </div>
                <div class="row">
                    <label for="pwd">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" required>
                </div>
                <div class="row">
                    <label for="email">Email</label>
                    <input type="text" pattern="^[A-z0-9._-]+@[A-z0-9._-]+.[a-z]+" name="email" id="email" placeholder="Enter email" required>
                </div>
                <div class="row">
                    <input type="submit" value="Sign up" onclick="IgnoreBeforeUnload();" name="btnRegister">
                </div>
            </form>
        </div>
    </section>
    <script src="../JavaScript/warning_leaving_page.js"></script>
</body>

</html>