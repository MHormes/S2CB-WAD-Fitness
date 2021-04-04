<?php
function CreateAccount()
{
    session_start();
    include '../includes/connection_template.php';

    try{
        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'INSERT INTO user VALUES(:firstName, :secondName, :username, :email, :password, :role)';
        $sth = $conn->prepare($sql);
        $sth->execute([':firstName' => $_POST['fname'], ':secondName' => $_POST['lname'], ':username' => $_POST['username'], ':password' => $_POST['password'], ':email' => $_POST['email'], ':role' => 'member']);

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $_SESSION['UsernameReg'] = $_POST["username"];
    header('Location: login.php');
}

if(isset($_POST['btnRegister']))
{
    CreateAccount();
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
        <link rel="stylesheet" type="text/css" href="../resources/css/registration.css">
    </head>
    <body>

        <div class="grid-container">
            <div class="header"><href=index.php/>AM Fitness</div>
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="premade.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            <a href="login.php"><div class="navi">Login</div></a>
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
                        <input type="submit" value="Sign up" name="btnRegister">
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>
