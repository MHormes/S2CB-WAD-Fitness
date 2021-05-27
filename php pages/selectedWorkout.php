<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';
include '../includes/workout_template.php';
include '../includes/favoriteWorkouts_template.php';
$_SESSION['woName'] = $_GET['woName'];
$woName = $_SESSION['woName'];
global $userLogged;

if (isset($_SESSION['loggedin'])) {
    include_once '../includes/user_template.php';
    $userLogged = $_SESSION['Username'];
    $user = GetUserDetails($_SESSION['Username']);
}

if (isset($_POST['btnUpdateWorkout'])) {
    $_SESSION['editModeWorkout'] = "true";
    $workout = GetSelectedWorkout($woName);
    $excercises = GetAllExercisesOfAll();
    $exercisesOfWorkout = GetAllExercisesForWorkout($woName);
} else {
    $excercises = GetAllExercisesForWorkout($woName);
    unset($_SESSION['editModeWorkout']);
}
if (isset($_POST['btnAddToFavoriteWorkouts'])) {
    NewFavoriteWorkout($userLogged, $woName);
    header("Refresh:0");
}
if (isset($_POST['btnRemoveFromFavoriteWorkouts'])) {
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
    <link rel="stylesheet" type="text/css" href="../resources/css/content.css">
</head>

<body>
    <div class="grid-container">
        <div class="header" onClick='location.href = "index.php";'>AM Fitness</div>
        <a href="contact.php">
            <div class="navi">Contact</div>
        </a>
        <a href="workoutPage.php">
            <div class="navi">Pre-made workouts</div>
        </a>
        <a href="categories.php">
            <div class="navi">Categories</div>
        </a>
        <a href="mypage.php">
            <div class="navi">My page</div>
        </a>

        <?php if (isset($_SESSION['loggedin'])) : ?>
            <a href="logout.php">
                <div class="navi">Logout</div>
            </a>
        <?php else : ?>
            <a href="login.php">
                <div class="navi">Login</div>
            </a>
        <?php endif; ?>
    </div>

    <!--View for udating a workout-->
    <?php if (isset($_SESSION['editModeWorkout'])) { ?>
        <div class="grid-container-content">
            <div class="subheader"><?php echo "Updating workout: " . $woName; ?></div>
            <div class="content-information">
                <form action="workoutPage.php" onsubmit="CreateNewWorkout();">
                    <h1>Name of the workout:</h1></br>
                    <input type="text" name="woName" id="woName" value="<?php echo $workout->GetWOName() ?>" required>
                    <h1>Muscle group trained:</h1></br>
                    <input type="text" name="muscleTrained" id="muscleTrained" value="<?php echo $workout->GetMuscleTrained() ?>" required>
                    </br></br>
                    <input class="button" id="btnUpdateWorkoutConfirm" type="submit" name="btnUpdateWorkoutConfirm" value="Confirm workout update">
                    </br></br>
                </form>
                <div class="grid-container2">
                    <!--Populate the specific categorie page with all the exercises-->
                    <?php

                    foreach ($excercises as $value) {
                        $i = 0;
                        foreach ($exercisesOfWorkout as $valueWorkout) {
                            if ($value->Name == $valueWorkout->exerciseName) { ?>
                                <p1><?php echo $value->Name ?></p1>
                                <input type="checkbox" id="<?php echo $value->Name ?>" name="exercise" checked>
                            <?php $i = 1; /* add code to go to the next in first foreach*/
                            }
                        }
                        if ($i == 0) {
                            ?>
                            <p1><?php echo $value->Name ?></p1>
                            <input type="checkbox" id="<?php echo $value->Name ?>" name="exercise">
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        <?php } else { ?>

            <div class="grid-container2">
                <div class="subheader"><?php echo "Showing exercises for workout: " . $woName; ?>
                    <!-- normal view-->
                    <?php if (isset($_SESSION['loggedin']) && $user->GetRole() != 'admin') { ?>
                        <form action="" method="post">
                            <?php if (is_null(GetFavoriteWorkoutDetails($_SESSION['Username'], $woName))) : ?>
                                <input class="button" type="submit" name="btnAddToFavoriteWorkouts" value="Add to favorites">
                            <?php else : ?>
                                <input class="button" type="submit" name="btnRemoveFromFavoriteWorkouts" value="Remove from favorites">
                            <?php endif; ?>
                        </form>
                    <?php } ?>
                    <?php if (isset($_SESSION['loggedin']) && $user->GetRole() == 'admin') { ?>
                        <form action="#" method="post"><input class="button" type="submit" name="btnUpdateWorkout" value="Update workout"></form>
                        <form action="#" onsubmit="return false"><input class="button" type="button" onclick="ConfirmDeleteWorkout('<?php echo $woName ?>');" name="btnRemoveWorkout" value="Remove workout"></form>
                    <?php } ?>
                </div>
                <?php
                foreach ($excercises as $value) {
                ?>
                    <a href="selectedExercise.php?exName=<?php echo $value->exerciseName; ?>">
                        <div class="menu"><img src="../resources/pictures/exercise.jpg" style="width: 100%" /></br><?php echo $value->exerciseName; ?></div>
                    </a>
            <?php
                }
            }
            ?>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="../includes/workout_scripts.js"></script>
           
</body>

</html>