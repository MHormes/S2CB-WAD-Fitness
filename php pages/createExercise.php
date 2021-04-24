<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';

$catName = $_SESSION['catName'];

if(isset($_POST['btnConfirmCreate'])){
    CreateNewExercise($_POST['exName'], $_SESSION['catName'], $_POST['reps'], $_POST['sets'], $_POST['timeDuration']);
    header('Location: selectedCategorie.php?catName='.$catName);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fitness website">
        <title>AM Fitness</title>
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/content.css">
        
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

        <div class="grid-container-content">
            <div class="subheader"><?php echo "Create a new exercise for categorie: " . $catName;?></div>     
            <div class="content-information">
            <form action="" method="post">
                <h1>Name of the exercise:</h1></br>
                <input type="text" name="exName" id="exName" required>
                <h1>Recommended amount of Repetitions:</h1></br>
                <input type="number" name="reps" id="reps" required>
                <h1>Recommended amount of sets:</h1></br>
                <input type="number" name="setsnumber" id="setsnumber" required>
                <h1>Estimated duration of the exercise (in minutes):</h1></br>
                <input type="number" name="timeDuration" id="timeDuration" required>
                </br></br>

                <input class="button" type="submit" name="btnConfirmCreate" value="Confirm new exercise">
                </form>
        </div>
    </body>
</html>