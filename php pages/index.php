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
    <?php include "../resources/navigation.php"; ?>
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