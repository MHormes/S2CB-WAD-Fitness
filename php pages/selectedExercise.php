<?php
session_start();
include '../includes/get_exercise_template.php';
$_SESSION['exName'] = $_GET['exName'];
$exerciseName = $_SESSION['exName'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fintess website">
        <title>AM Fitness</title>
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../recources/css/content.css">
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
        
        <div class="content-container">
            <div class="subheader"><?php echo "Showing page for exercise: " . $exerciseName; ?></div>
            <a><div class="content-video" onClick=''><img src="../resources/pictures/VideoCap.png"/></div></a>
            <div class="content-information">
                <h1><?php echo "test" ?></h1></br>
                <h1><?php echo "test2"?></h1></br>
            </div>
        </div>
    </body>
</html>