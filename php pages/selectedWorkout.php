<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';
include '../includes/workout_template.php';
$_SESSION['woName'] = $_GET['woName'];
$woName = $_SESSION['woName'];

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
            <a href="workout.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            
            <?php if(isset($_SESSION['loggedin'])): ?>
            <a href="logout.php"><div class="navi">Logout</div></a>
            <?php else: ?>
            <a href="login.php"><div class="navi">Login</div></a>
            <?php endif; ?>    
        </div>

        <div class="grid-container2">
            <div class="subheader"><?php echo "Showing workout: " . $woName; ?>
            <?php if(isset($_SESSION['loggedin']) && $user->GetRole() == 'admin'){ ?>
                <form action="#" method="post"><input class="button" type="submit" name="btnUpdateWorkout" value="Update workout"></form>
            <?php } ?>
            </div>
        </div>
    </body>
</html>