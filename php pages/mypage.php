<?php
session_start();
include '../includes/user_template.php';

if (isset($_POST['btnUpdate'])) {
    UpdateAccount($_SESSION['Username'], $_POST['ufname'], $_POST['ulname'], $_POST['uusername'], $_POST['upassword'], $_POST['uemail']);
    header('Location: mypage.php');
    exit();
}

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
    <link rel="stylesheet" type="text/css" href="../resources/css/login.css">
</head>

<body>
    <?php include "../resources/navigation.php"; ?>
    <?php
    if (isset($_SESSION['Username'])) {
        echo "Welcome to your own page, " . $_SESSION['Username']; ?>
        <div class="grid-container3">
            <div class="subheader">My page</div>
            <?php if ($user->GetRole() == 'member') { ?>
                <a href="favorite.php">
                    <div class="navi">Favorite exercises</div>
                </a>
                <a href="favoriteWorkouts.php">
                    <div class="navi">Favorite workouts</div>
                </a>
            <?php } ?>
            <a href="myinformation.php">
                <div class="navi">Personal information</div>
            </a>
        </div>
    <?php
    } else {
        echo "To see your page please log-in";
    }
    ?>
</body>

</html>