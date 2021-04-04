<?php
include '../includes/get_categories_template.php';
$categories = GetAllCategories();
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
           
            <!--Populate the categorie page with all the categories-->
            <?php
            foreach($categories as $value){
                $catName = $value->MuscleTrained;
                ?>
            <a href="selectedCategorie.php"><div class="menu" onClick='<?php SaveChosenCategorie($catName)?>'><img src="../resources/pictures/legs.jpg" style="width: 100%"/><?php echo $catName ?></div></a>
            <?php
            }
            ?>
            
        </div>
    </body>
</html>
