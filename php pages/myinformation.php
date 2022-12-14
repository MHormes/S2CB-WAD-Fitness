<?php
session_start();
include '../includes/user_template.php';

if (isset($_POST['btnUpdate'])) {
    UpdateAccount($_SESSION['Username'], $_POST['ufname'], $_POST['ulname'], $_POST['uusername'], $_POST['upassword'], $_POST['uemail']);
    header('Location: mypage.php');
    exit();
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
    </div>
    <?php
    if (isset($_SESSION['Username'])) {
        $userUsername = $_SESSION['Username'];
        $newUser = GetUserDetails($userUsername); ?>
        <div class="row">
            <form id="update" method="post" action="mypage.php" class="login-form">
                <!-- inserting first name, second name, username, password and confirm password -->
                <div class="row">
                    <label for="fName">First name</label>
                    <input type="text" name="ufname" id="ufname" value=<?php echo $newUser->GetFirstname(); ?> required>
                </div>
                <div class="row">
                    <label for="lName">Last name</label>
                    <input type="text" name="ulname" id="ulname" value=<?php echo $newUser->GetSecondname(); ?> required>
                </div>
                <div class="row">
                    <label for="username">Username</label>
                    <input type="text" name="uusername" id="uusername" value=<?php echo $newUser->GetUsername(); ?> required>
                </div>
                <div class="row">
                    <label for="pwd">Password</label>
                    <input type="password" name="upassword" id="upassword" value=<?php echo $newUser->GetPassword(); ?> required>
                </div>
                <div class="row">
                    <label for="email">Email</label>
                    <input type="text" pattern="^[A-z0-9._-]+@[A-z0-9._-]+.[a-z]+" name="uemail" id="uemail" value=<?php echo $newUser->GetEmail(); ?> required>
                </div>
                <div class="row">
                    <input type="submit" value="Update" onclick="IgnoreBeforeUnload();" name="btnUpdate">
                </div>
            </form>
        </div>
    <?php
    } else {
        echo "To see your page please log-in";
    }
    ?>
    <script src="../JavaScript/warning_leaving_page.js"></script>
</body>

</html>