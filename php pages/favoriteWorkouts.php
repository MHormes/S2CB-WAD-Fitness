<?php
session_start();
include '../includes/favoriteWorkouts_template.php';
$user = $_SESSION['Username'];
$workouts = GetFavoritesWorkouts($user);
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
        <div class="subheader">Showing all workouts</div>
        <!--Populate the categorie page with all the categories-->
        <?php
        foreach ($workouts as $value) { ?>
            <a href="favoriteWorkoutsExercises.php?woName=<?php echo $value->Name; ?>">
                <div class="menu"><img src="../resources/pictures/pre-made.jpg" style="width: 100%" /></br><?php echo $value->Name; ?></div>
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>