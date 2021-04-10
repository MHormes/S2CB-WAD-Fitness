<?php
session_start();
include '../includes/get_exercise_template.php';
$_SESSION['exName'] = $_GET['exName'];
$exerciseName = $_SESSION['exName'];
$exercise = GetChosenExercise($exerciseName);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fintess website">
        <title>AM Fitness</title>
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/content.css">
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
        
        <div class="grid-container-content">
            <div class="subheader"><?php echo "Showing page for exercise: " . $exercise->GetExerciseName(); ?></div>
            <a href=""><div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%"/></div></a>
            <div class="content-information">
                <h1><?php echo "This exercise is used to train your ". $exercise->GetMuscleTrained(); ?></h1></br>
                <h1><?php echo "Recommended amount of Repetitions: ". $exercise->GetRepsNumber();?></h1></br>
                <h1><?php echo "Recommended amount of sets: ". $exercise->GetSetsNumber();?></h1></br>
                <h1><?php echo "Estimated duration of the exercise: ". $exercise->GetTimeDuration(). " minutes";?></h1></br>
            </div>
        </div>
    </body>
</html>