<?php
session_start();
include '../includes/categories_template.php';
include '../includes/workout_template.php';

$workout = GetAllWorkouts();
if(isset($_SESSION['loggedin']))
{
    include_once '../includes/user_template.php';
    $user = GetUserDetails($_SESSION['Username']);
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
        
        <div class="grid-container2">
            <div class="subheader">Pre-made workouts
            <?php if(isset($_SESSION['loggedin']) && $user->GetRole() == 'admin'){ ?>
                <form action="createWorkout.php" method="post"><input class="button" type="submit" name="btnNewWorkout" value="Create new workout"></form>
            <?php } ?>
            </div>
            <!--Populate the workout page with all available workouts-->
            <?php
            foreach($workout as $value){
                ?>
            <a href="selectedWorkout.php?woName=<?php echo $value->Name; ?>"><div class="menu"><img src="../resources/pictures/pre-made.jpg" style="width: 100%"/></br><?php echo $value->Name; ?></div></a>
            <?php
            }
            ?>
        </div>
    </body>
</html>