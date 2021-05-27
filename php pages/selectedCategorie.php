<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';
$_SESSION['catName'] = $_GET['catName'];
$catName = $_SESSION['catName'];
$excercises = GetAllExercises($catName);

if (isset($_SESSION['loggedin'])) {
    include_once '../includes/user_template.php';
    $user = GetUserDetails($_SESSION['Username']);
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
</head>

<body>
    <?php include "../resources/navigation.php"; ?>

    <div class="grid-container2">
        <div class="subheader"><?php echo "Showing all exercises for category: " . $catName; ?>
            <?php if (isset($_SESSION['loggedin']) && $user->GetRole() == 'admin') { ?>
                <form action="createExercise.php" method="post"><input class="button" type="submit" name="btnNewExercise" value="Create new exercise"></form>
            <?php } ?>
        </div>
        <!--Populate the specific categorie page with all the exercises for this categorie-->
        <?php
        foreach ($excercises as $value) {
        ?>
            <a href="selectedExercise.php?exName=<?php echo $value->Name; ?>">
                <div class="menu"><img src="../resources/pictures/exercise.jpg" style="width: 100%" /></br><?php echo $value->Name; ?></div>
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>