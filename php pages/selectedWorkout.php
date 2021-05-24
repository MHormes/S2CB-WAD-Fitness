<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';
include '../includes/workout_template.php';
include '../includes/favoriteWorkouts_template.php';

$_SESSION['woName'] = $_GET['woName'];
$woName = $_SESSION['woName'];
$excercises = GetAllExercisesForWorkout($woName);
global $userLogged;

if(isset($_SESSION['loggedin']))
{
    include_once '../includes/user_template.php';
    $userLogged = $_SESSION['Username'];
    $user = GetUserDetails($_SESSION['Username']);
}


if(isset($_POST['btnRemoveWorkout'])){
    RemoveWorkout($woName);
    header('Location: workout.php');
}

if(isset($_POST['btnAddToFavoriteWorkouts']))
{
    NewFavoriteWorkout($userLogged, $woName);
    header("Refresh:0");
}

if(isset($_POST['btnRemoveFromFavoriteWorkouts']))
{
    RemoveFavoriteWorkout($userLogged, $woName);
    header("Refresh:0");
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
            <div class="subheader"><?php echo "Showing exercises in workout: " . $woName; ?>
                <?php if(isset($_SESSION['loggedin']) && $user->GetRole() != 'admin') { ?> 
                <form action="" method="post">
                    <?php if(is_null(GetFavoriteWorkoutDetails($_SESSION['Username'], $woName))): ?>
                    <input class="button" type="submit" name="btnAddToFavoriteWorkouts" value="Add to favorites">
                    <?php else: ?>
                    <input class="button" type="submit" name="btnRemoveFromFavoriteWorkouts" value="Remove from favorites">
                    <?php endif; ?>
                </form>
                <?php } ?>
            <?php if(isset($_SESSION['loggedin']) && $user->GetRole() == 'admin'){ ?>
                <form action="#" method="post"><input class="button" type="submit" name="btnUpdateWorkout" value="Update workout"></form>
                <form action="#" method="post"><input class="button" type="submit" name="btnRemoveWorkout" value="Remove workout(Deletes the workout without any confirmation)"></form>
            <?php } ?>
            </div>
            <?php
            foreach($excercises as $value){
                ?>
            <a href="selectedExercise.php?exName=<?php echo $value->exerciseName; ?>"><div class="menu"><img src="../resources/pictures/exercise.jpg" style="width: 100%"/></br><?php echo $value->exerciseName; ?></div></a>
            <?php
            }
            ?>
            
        </div>
    </body>
</html>