<?php
session_start();
include '../includes/connection_template.php';
function loginAccount()
{
    global $username;
    global $password;
    global $connstring;
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM user WHERE Username = :username AND Password = :password';
        $sth = $conn->prepare($sql);

        $sth->execute(
            array(
                ':username' => $_POST["username"],
                ':password' => $_POST["password"]
            )
        );
        $users = $sth->fetchAll();
        $count = $sth->rowCount();

        if ($count > 0) {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['Password'] = $_POST["password"];
            $_SESSION['Username'] = $_POST["username"];
            setcookie('loginMessage', "", 1);
            header('Location: mypage.php');
        } 
        else {
            setcookie('loginMessage', "User not found");
            header('Location: login.php');
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['btnLogin']))
{
    loginAccount();
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
    </head>
    <body>
        <div class="grid-container">
            <div class="header" onClick='location.href = "index.php";'>AM Fitness</div>
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="premade.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
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
                    <a href="registration.php"><div class="row">
                        <input type="button" value="Sign up">
                        </div></a>
                </form>

                <?php
                if(isset($_SESSION["UsernameReg"])){
                    setcookie('loginMessage', "", 1);
                    echo "Thank you for creating an account. You can now login using the password for account:" . $_SESSION['UsernameReg'];
                }
                if(isset($_COOKIE['loginMessage'])){
                    echo $_COOKIE['loginMessage'];
                }
                
                ?>
            </div>
        </section>
    </body>
</html>
