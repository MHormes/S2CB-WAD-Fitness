<?php
session_start();
include '../includes/favorite_template.php';
$user = $_SESSION['Username'];
$categories = GetFavoritesCategories($user);
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
        <div class="subheader">Showing all categories</div>
        <!--Populate the categorie page with all the categories-->
        <?php
        foreach ($categories as $value) { ?>
            <a href="favCategories.php?catName=<?php echo $value->MuscleTrained; ?>">
                <div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%" /></br><?php echo $value->MuscleTrained; ?></div>
            </a>
        <?php
        }
        ?>
    </div>
</body>

</html>