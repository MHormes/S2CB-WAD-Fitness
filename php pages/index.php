<?php
session_start();
include '../includes/categories_template.php';
include '../includes/workout_template.php';
$categories = GetAllCategories();
$workouts = GetAllWorkouts();
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
        <div class="subheader">Pre-made workouts</div>
        <!--Populate the index page with a set of 4 workouts-->
        <?php
        for ($i = 0; $i <= 3; $i++) { ?>
            <a href="selectedWorkout.php?woName=<?php echo $workouts[$i]->Name; ?>">
                <div class="menu"><img src="../resources/pictures/pre-made.jpg" style="width: 100%" /></br><?php echo $workouts[$i]->Name; ?></div>
            </a>
        <?php
        }
        ?>
    </div>

    <div class="grid-container2">
        <div class="subheader">Categories</div>
        <!--Populate the index page with a set of 4 categories-->
        <?php
        for ($i = 0; $i <= 3; $i++) { ?>
            <a href="selectedCategorie.php?catName=<?php echo $categories[$i]->MuscleTrained; ?>">
                <div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%" /></br><?php echo $categories[$i]->MuscleTrained; ?></div>
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>