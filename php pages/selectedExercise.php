<?php
include '../includes/exercise_template.php';
include '../includes/connection_template.php';
include '../includes/favorite_template.php';
session_start();
$_SESSION['exName'] = $_GET['exName'];
$exerciseName = $_SESSION['exName'];
$exercise = GetChosenExercise($exerciseName);
global $userLogged;

if (isset($_SESSION['loggedin'])) {
    include_once '../includes/user_template.php';
    $userLogged = $_SESSION['Username'];
    $user = GetUserDetails($_SESSION['Username']);
}

if (isset($_POST['btnUpdate'])) {
    $_SESSION['editMode'] = "true";
} else if (isset($_POST['btnConfirmUpdate'])) {
    unset($_SESSION['editMode']);
    UpdateExercise($exerciseName, $_POST['muscleTrained'], $_POST['reps'], $_POST['setsnumber'], $_POST['timeDuration']);
} else {
    unset($_SESSION['editMode']);
}
if (isset($_POST['btnAddToFavorites'])) {
    NewFavorite($userLogged, $exerciseName);
    header("Refresh:0");
}
if (isset($_POST['btnRemoveFromFavorites'])) {
    RemoveFavorite($userLogged, $exerciseName);
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

    <?php include "../resources/navigation.php"; ?>

    <!--Edit mode enabled/update view for admin editing page -->
    <div class="grid-container-content">
        <div class="subheader"><?php echo "Showing page for exercise: " . $exercise->GetExerciseName(); ?></div>
        <?php if (isset($_SESSION['editMode'])) { ?>
            <a href="">
                <div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%" /></div>
            </a>
            <div class="content-information">
                <form action="" method="post">
                    <h1>This exercise is used to train your:</h1></br>
                    <input type="text" name="muscleTrained" id="muscleTrained" value=<?php echo $exercise->GetMuscleTrained(); ?> required>

                    <h1>Recommended amount of Repetitions:</h1></br>
                    <input type="number" name="reps" id="reps" value=<?php echo $exercise->GetRepsNumber(); ?> required>

                    <h1>Recommended amount of sets:</h1></br>
                    <input type="number" name="setsnumber" id="setsnumber" value=<?php echo $exercise->GetSetsNumber(); ?> required>

                    <h1>Estimated duration of the exercise (in minutes):</h1></br>
                    <input type="number" name="timeDuration" id="timeDuration" value=<?php echo $exercise->GetTimeDuration(); ?> required>
                    </br></br>
                    <input class="button" type="submit" name="btnConfirmUpdate" onclick="IgnoreBeforeUnload();" value="Confirm exercise update">
                    </br></br>
                </form>
                <script src="../JavaScript/warning_leaving_page.js"></script>
                <!--Standard view for everyone-->
            <?php } else { ?>
                <a href="">
                    <div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%" /></div>
                </a>
                <div class="content-information">
                    <h1><?php echo "This exercise is used to train your " . $exercise->GetMuscleTrained(); ?></h1></br>
                    <h1><?php echo "Recommended amount of Repetitions: " . $exercise->GetRepsNumber(); ?></h1></br>
                    <h1><?php echo "Recommended amount of sets: " . $exercise->GetSetsNumber(); ?></h1></br>
                    <h1><?php echo "Estimated duration of the exercise: " . $exercise->GetTimeDuration() . " minutes"; ?></h1></br>
                    <!--If a admin is logged in, Show update and delete button-->
                    <?php if (isset($_SESSION['loggedin']) && $user->GetRole() == 'admin') { ?>
                        <form action="#" method="post">
                            <input class="button" type="submit" name="btnUpdate" value="Update exercise">
                        </form></br>
                        </br>
                        <form action="#" onsubmit="return false">
                            <input class="button" type="button" onclick="ConfirmDeleteExercise('<?php echo $exerciseName; ?>', '<?php echo $exercise->GetMuscleTrained(); ?>')" name="btnDelete" value="Delete exercise">
                        </form>
                    <?php } ?>
                    <?php if (isset($_SESSION['loggedin']) && $user->GetRole() != 'admin') { ?>
                        <form action="" method="post">
                            <?php if (is_null(GetFavoriteDetails($_SESSION['Username'], $exerciseName))) : ?>
                                <input class="button" type="submit" name="btnAddToFavorites" value="Add to favorites">
                            <?php else : ?>
                                <input class="button" type="submit" name="btnRemoveFromFavorites" value="Remove from favorites">
                            <?php endif; ?>
                        </form>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="../JavaScript/exercise_scripts.js"></script>
</body>

</html>