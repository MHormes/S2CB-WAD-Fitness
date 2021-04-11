<?php
include '../includes/exercise_template.php';
include_once '../includes/get_user.php';
session_start();
$_SESSION['exName'] = $_GET['exName'];
$exerciseName = $_SESSION['exName'];

if(isset($_SESSION['Username']))
{
    $newUser = GetUserDetails($_SESSION['Username']);
}

if(isset($_POST['btnDelete']))
{
    DeleteExercise($exerciseName);
    header("Location: categories.php");
}
else if(isset($_POST['btnUpdate'])){
   $_SESSION['editMode'] = "true";
   $exercise = GetChosenExercise($exerciseName);
}
else{
    $exercise = GetChosenExercise($exerciseName);
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
        <link rel="stylesheet" type="text/css" href="../resources/css/content.css">
    </head>
    <body>
        <div class="grid-container">
            <div class="header" onClick='location.href = "index.php";'>AM Fitness</div>
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="premade.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            
            <?php if(isset($_SESSION['loggedin'])): ?>
            <a href="logout.php"><div class="navi">Logout</div></a>
            <?php else: ?>
            <a href="login.php"><div class="navi">Login</div></a>
            <?php endif; ?>

        </div>
        
        <div class="grid-container-content">
            <div class="subheader"><?php echo "Showing page for exercise: " . $exercise->GetExerciseName(); ?></div>
            <?php if(isset($_SESSION['editMode'])){?>
                <a href=""><div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%"/></div></a>
            <div class="content-information">
                <h1><?php echo "This exercise is used to train your ". "lets hope this works" ?></h1></br>
                <h1><?php echo "Recommended amount of Repetitions: ". $exercise->GetRepsNumber();?></h1></br>
                <h1><?php echo "Recommended amount of sets: ". $exercise->GetSetsNumber();?></h1></br>
                <h1><?php echo "Estimated duration of the exercise: ". $exercise->GetTimeDuration(). " minutes";?></h1></br>
                <?php }               
                else{ ?>
                    <a href=""><div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%"/></div></a>
            <div class="content-information">
                <h1><?php echo "This exercise is used to train your ". $exercise->GetMuscleTrained(); ?></h1></br>
                <h1><?php echo "Recommended amount of Repetitions: ". $exercise->GetRepsNumber();?></h1></br>
                <h1><?php echo "Recommended amount of sets: ". $exercise->GetSetsNumber();?></h1></br>
                <h1><?php echo "Estimated duration of the exercise: ". $exercise->GetTimeDuration(). " minutes";?></h1></br>
                <?php if($newUser->GetRole() == 'admin')
                    {?> 
                <form action="" method="post">
                    <input class="button" type="submit" name="btnUpdate" value="Update exercise"></br>
                    </br>
                    <input class="button" type="submit" name="btnDelete" value="Delete exercise(Deletes the exercise without any confirmation. Should be changed when figured out how...)">
                </form>
                <?php} ?>
            
                <?php
                }?>
            </div>
        </div>
    </body>
</html>