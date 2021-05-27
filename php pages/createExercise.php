<?php
session_start();
include '../includes/categories_template.php';
include '../includes/exercise_template.php';

$catName = $_SESSION['catName'];

if (isset($_POST['btnConfirmCreate'])) {
    if ($_SESSION['catName'] == "input below") {
        CreateNewExercise($_POST['exName'], $_POST['newCatName'], $_POST['reps'], $_POST['setsnumber'], $_POST['timeDuration']);
        header('Location: selectedCategorie.php?catName=' . $_POST['newCatName']);
    } else {
        CreateNewExercise($_POST['exName'], $_SESSION['catName'], $_POST['reps'], $_POST['setsnumber'], $_POST['timeDuration']);
        header('Location: selectedCategorie.php?catName=' . $catName);
    }
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
    <?php include "../resources/navigation.php"; ?>

    <div class="grid-container-content">
        <div class="subheader"><?php echo "Create a new exercise for categorie: " . $catName; ?></div>
        <div class="content-information">
            <form action="" method="post">
                <h1>Name of the exercise:</h1></br>
                <input type="text" name="exName" id="exName" required>
                <?php if ($catName == "input below") {
                ?>
                    <h1>Categorie of the exercise:</h1></br>
                    <input type="text" name="newCatName" id="newCatName" required>
                <?php } ?>
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