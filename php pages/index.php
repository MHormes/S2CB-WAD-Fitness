<?php
session_start();
GetallCategories();

function GetAllCategories()
{
    include '../includes/connection_template.php';
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM exercise';
        $sth = $conn->prepare($sql);
        $sth->execute();
        
        $categories = $sth->fetch_all();
        echo $categories;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
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
        <div class="grid-container">
            <div class="header" onClick='location.href = "index.html";'>AM Fitness</div>
            <a href="contact.php"><div class="navi">Contact</div></a>
            <a href="premade.php"><div class="navi">Pre-made workouts</div></a>
            <a href="categories.php"><div class="navi">Categories</div></a>
            <a href="mypage.php"><div class="navi">My page</div></a>
            <a href="login.php"><div class="navi">Login</div></a>
        </div>
        <div class="grid-container2">
            <div class="subheader">Pre-made workouts</div>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%"/></div></a>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%;"/></div></a>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%"/></div></a>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%"/></div></a>
        </div>
        <div class="grid-container2">
            <div class="subheader">Categories</div>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%"/></div></a>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%;"/></div></a>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%"/></div></a>
            <a href=""><div class="menu"><img src="../resources/pictures/legs.jpg" style="width: 100%"/></div></a>
        </div>
    </body>
</html>
