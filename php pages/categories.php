<?php
session_start();
include '../includes/categories_template.php';
$categories = GetAllCategories();
$_SESSION['catName'] = "input below";
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

        <div class="subheader">Showing all categories. Choose one to see the exercises part of it.
            <?php if (isset($_SESSION['loggedin']) && $user->GetRole() == 'admin') { ?>
                <form action="createExercise.php" method="post"><input class="button" type="submit" name="btnNewExercise" value="Create new exercise for unexisting categorie"></form>
            <?php } ?>
        </div>
        <!--Populate the categorie page with all the categories-->
        <?php

        foreach ($categories as $value) { ?>
            <a href="selectedCategorie.php?catName=<?php echo $value->MuscleTrained; ?>">
                <div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%" /></br><?php echo $value->MuscleTrained; ?></div>
            </a>
        <?php
        }
        ?>

    </div>
</body>

</html>