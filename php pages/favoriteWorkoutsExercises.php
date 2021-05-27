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
    <?php include "../resources/navigation.php"; ?>

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