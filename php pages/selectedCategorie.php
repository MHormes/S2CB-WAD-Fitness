<?php
session_start();
include '../includes/get_categories_template.php';
include '../includes/get_exercise_template.php';
$catName = $_SESSION['catName'];
$excercises = GetAllExercises($catName);
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
            <a href="login.php"><div class="navi">Login</div></a>
        </div>
        <div class="grid-container2">
            <div class="subheader"><?php echo "Showing all exersices for categorie: " . $catName; ?>  </div>
            
            <!--Populate the specific categorie page with all the exercises for this categorie-->
            <?php
            for($i = 0; $i < count($excercises); $i++){
                ?>
            <a href="selectedExercise.php"><div class="menu" onClick='<?php $_SESSION['exName'] = $excercises[$i]->Name; ?>'><img src="../resources/pictures/exercise.jpg" style="width: 100%"/><?php echo $excercises[$i]->Name; ?></div></a>
            <?php
            }
            ?>
        </div>
    </body>
</html>