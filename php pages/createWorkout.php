<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';
include '../includes/workout_template.php';
$excercises = GetAllExercisesOfAll();

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
            <div class="subheader">Create a new workout</div>     
            <div class="content-information">
            <form action="#" onsubmit="return false">
                <h1>Name of the workout:</h1></br>
                <input type="text" name="woName" id="woName" required>
                <h1>Muscle group trained:</h1></br>
                <input type="text" name="muscleTrained" id="muscleTrained" required>
                </br></br>
                <input class="button" id="buttonConfirmWO" type="submit" name="buttonConfirmWO" value="Confirm new workout">
            </form>
            <div class="grid-container2">
            <!--Populate the specific categorie page with all the exercises-->
            <?php
            foreach($excercises as $value){
                ?>
            <p1><?php echo $value->Name ?></p1>
            <input type="checkbox" id="<?php echo $value->Name?>" name="exercise">
            <?php
            }
            ?>
            
        </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#buttonConfirmWO").click(function(){
        var selectedExercise = [];
        $(':checkbox[name="exercise"]:checked').each (function () {
        selectedExercise.push(this.id);
        console.log(selectedExercise);
    });
    $.ajax({
        type: 'post',
        url: "../includes/workout_create_template.php",
        data: { workoutName: $("[id$='woName']").val(), muscleTrained: $("[id$='muscleTrained']").val(), selectedExcerciseArray: selectedExercise },
        success:function(result){
                console.log(result);
        }
    });
    window.location.replace('workout.php');
        });
    });
    </script>
    </body>
</html>

