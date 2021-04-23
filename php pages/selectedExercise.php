<?php
include '../includes/exercise_template.php';
include '../includes/connection_template.php';
session_start();
$_SESSION['exName'] = $_GET['exName'];
$exerciseName = $_SESSION['exName'];

function UpdateExercise($exerciseName){
    global $username;
    global $password;
    global $connstring;

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'UPDATE exercise SET MuscleTrained = :muscleTrained, Reps = :reps, SetsNumber = :setsnumber, Duration = :timeDuration WHERE Name = :exerciseName';
        $sth = $conn->prepare($sql);
        $sth->execute([':muscleTrained' => $_POST['muscleTrained'], ':setsnumber' => $_POST['setsnumber'], ':reps' => $_POST['reps'], ':timeDuration' => $_POST['timeDuration'], ':exerciseName' => $exerciseName]);
        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_SESSION['loggedin']))
{
    include_once '../includes/get_user.php';
    $user = GetUserDetails($_SESSION['Username']);
}
if(isset($_POST['btnDelete']))
{
    DeleteExercise($exerciseName);
    header("Location: categories.php");
}
else if(isset($_POST['btnUpdate'])){
   $_SESSION['editMode'] = "true";
   $exercise = GetChosenExercise($exerciseName);
}
else if(isset($_POST['btnConfirmUpdate'])){
    unset($_SESSION['editMode']);
    UpdateExercise($exerciseName);
    $exercise = GetChosenExercise($exerciseName);
}
else{
    $exercise = GetChosenExercise($exerciseName);
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
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="premade.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            
            <!--Login button-->
            <?php if(isset($_SESSION['loggedin'])): ?>
            <a href="logout.php"><div class="navi">Logout</div></a>
            <?php else: ?>
            <a href="login.php"><div class="navi">Login</div></a>
            <?php endif; ?>

        </div>
        
        <!--Edit mode enabled/update view for admin editing page -->
        <div class="grid-container-content">
            <div class="subheader"><?php echo "Showing page for exercise: " . $exercise->GetExerciseName(); ?></div>
            <?php if(isset($_SESSION['editMode']))
            {?>
                <a href=""><div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%"/></div></a>
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
                    <input class="button" type="submit" name="btnConfirmUpdate" value="Confirm exercise update">
                </form>

                <!--Standard view for everyone-->
      <?php }  else { ?>
                    <a href=""><div class="content-video"><img src="../resources/pictures/VideoCap.png" style="width:100%"/></div></a>
                <div class="content-information">
                <h1><?php echo "This exercise is used to train your ". $exercise->GetMuscleTrained(); ?></h1></br>
                <h1><?php echo "Recommended amount of Repetitions: ". $exercise->GetRepsNumber();?></h1></br>
                <h1><?php echo "Recommended amount of sets: ". $exercise->GetSetsNumber();?></h1></br>
                <h1><?php echo "Estimated duration of the exercise: ". $exercise->GetTimeDuration(). " minutes";?></h1></br>
                <!--If a admin is logged in, Show update and delete button-->
                <?php if(isset($_SESSION['loggedin']) && $user->GetRole() == 'admin') { ?> 
                <form action="" method="post">
                    <input class="button" type="submit" name="btnUpdate" value="Update exercise"></br>
                    </br>
                    <input class="button" type="submit" name="btnDelete" value="Delete exercise(Deletes the exercise without any confirmation)">
                </form>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </body>
</html>