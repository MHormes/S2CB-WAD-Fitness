<?php
session_start();
include '../includes/user_template.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fintess website">
        <title>AM Fitness</title>
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/contact.css">
    </head>
    <body>
        <div class="grid-container">
            <div class="header" onClick='location.href = "index.php";'>AM Fitness</div>
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="workout.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            
            <?php if(isset($_SESSION['loggedin'])): ?>
            <a href="logout.php"><div class="navi">Logout</div></a>
            <?php else: ?>
            <a href="login.php"><div class="navi">Login</div></a>
            <?php endif; ?>
        </div>
        <?php 
        if(isset($_SESSION['Username'])){
        $userUsername = $_SESSION['Username'];
        $newUser = GetUserDetails($userUsername); ?>
        <section class="contact-form">
            <div class="row">
                <h2>Contact</h2>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <!-- inserting name, email, message -->
                    <div class="row">
                        <label for="contName">Full name</label>
                        <input type="text" name="contName" id="contName" value=<?php echo $newUser->GetFirstname() . ' ' . $newUser->GetSecondname(); ?> required>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value=<?php echo $newUser->GetEmail(); ?> required>
                    </div>
                    <div class="row">
                        <label for="message">Message</label>
                        <input type="message" name="message" id="message" placeholder="Write us a message" required>
                    </div>
                    <div class="row">
                        <input type="submit" value="Send" name="btnSend">
                    </div>
                  </form>  
            </div>
        </section>
        <?php
        }    
        else {
        ?>
        <section class="contact-form">
            <div class="row">
                <h2>Contact</h2>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <!-- inserting name, email, message -->
                    <div class="row">
                        <label for="name">Full name</label>
                        <input type="text" name="name" id="name" placeholder="Enter name" required>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="row">
                        <label for="message">Message</label>
                        <input type="message" name="message" id="message" placeholder="Write us a message" required>
                    </div>
                    <div class="row">
                        <input type="submit" value="Send" name="btnSend">
                    </div>
                </form> 
            </div>
        </section> 
        <?php
        }
        ?>
    </body>
</html>
