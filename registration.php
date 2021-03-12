<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fintess website">
        <title>AM Fitness</title>
        <link rel="stylesheet" type="text/css" href="resources/css/registration.css">



    </head>
    <body>

        <div class="grid-container">
            <div class="header"><href=index.html/>AM Fitness</div>
            <a href="contact.html"><div class="navi">Contact</div></a>
            <a href="premade.html"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.html"><div class="navi">Categories</div></a>
            <a href="mypage.html"><div class="navi">My page</div></a>
            <a href="login.html"><div class="navi">Login</div></a>
        </div>
        <!-- contact form -->
        <section class="registration-form">
            <div class="row">
                <h2>Sign up</h2>
            </div>
            <div class="row">
                <form id="register" method="post" action="registration.php" class="registration-form">
                    <!-- inserting first name, second name, username, password and confirm password -->
                    <div class="row">
                        <label for="fName">First name</label>
                        <input type="text" name="fName" id="name" placeholder="Enter first name" required>
                    </div>
                    <div class="row">
                        <label for="lName">Last name</label>
                        <input type="text" name="lName" id="name" placeholder="Enter last name" required>
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
                        <input type="text" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="row">
                        <input type="submit" value="Sign up" name="btnRegister">
                    </div>
                </form>
                <?php


                function CreateAccount()

                {
                include "php/User.php";

                $fName = $_POST["fName"];
                $lName = $_POST["lName"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $email = $_POST['email'];
                $user = new User($fName, $lName, $username, $password, $email);
                echo $user->RegMessage();
                }

                if(isset($_POST['btnRegister']))
                {
                CreateAccount();
                header('Location: login.html');

                }
                ?>
            </div>
        </section>
    </body>
</html>
