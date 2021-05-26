<?php
session_start();
include '../includes/favoriteWorkouts_template.php';
$_SESSION['woName'] = $_GET['woName'];
$woName = $_SESSION['woName'];

$user = $_SESSION['Username'];
$exercises = GetFavoritesExercises($user, $woName);
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

    <div class="grid-container2">
        <div class="subheader"><?php echo "Showing all exercises for workout: " . $woName; ?>
        </div>
        <!--Populate the specific categorie page with all the exercises for this categorie-->
        <?php
        foreach ($exercises as $value) {
        ?>
            <a href="selectedExercise.php?exName=<?php echo $value->exerciseName; ?>">
                <div class="menu"><img src="../resources/pictures/exercise.jpg" style="width: 100%" /></br><?php echo $value->exerciseName; ?></div>
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>