<?php
session_start();
include '../includes/user_template.php';
include '../includes/contact_template.php';

if (isset($_POST['btnSend'])) {
    if (isset($_SESSION['Username'])) {
        SendMessage($_POST['bName'], $_POST['bEmail'], $_POST['bMessage'], 'true');
    } else {
        SendMessage($_POST['bName'], $_POST['bEmail'], $_POST['bMessage'], 'false');
    }
    header('Location: index.php', true, 301);
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
    <link rel="stylesheet" type="text/css" href="../resources/css/contact.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/snackbar.css">
</head>

<body>
    <?php include "../resources/navigation.php"; ?>
    <?php
    if (isset($_SESSION['Username'])) {
        $userUsername = $_SESSION['Username'];
        $newUser = GetUserDetails($userUsername); ?>
        <section class="contact-form">
            <div class="row">
                <h2>Contact</h2>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <!-- inserting name, email, message -->
                    <div class="row">
                        <label for="bName">Full name</label>
                        <input type="text" name="bName" id="bName" value="<?php echo $newUser->GetFirstname() . ' ' . $newUser->GetSecondname(); ?>" required>
                    </div>
                    <div class="row">
                        <label for="bEmail">Email</label>
                        <input type="text" name="bEmail" id="bEmail" value=<?php echo $newUser->GetEmail(); ?> required>
                    </div>
                    <div class="row">
                        <label for="bMessage">Message</label>
                        <input type="message" class="message" name="bMessage" id="bMessage" placeholder="Write us a message" required>
                    </div>
                    <div class="row">
                        <input type="submit" value="Send" name="btnSend" onclick="IgnoreBeforeUnload();">
                    </div>
                </form>
            </div>
        </section>
    <?php
    } else {
    ?>
        <section class="contact-form">
            <div class="row">
                <h2>Contact</h2>
            </div>
            <div class="row">
                <form method="post" action="#" class="contact-form">
                    <!-- inserting name, email, message -->
                    <div class="row">
                        <label for="bName">Full name</label>
                        <input type="text" name="bName" id="bName" placeholder="Enter name" required>
                    </div>
                    <div class="row">
                        <label for="bEmail">Email</label>
                        <input type="text" name="bEmail" id="bEmail" placeholder="Enter email" required>
                    </div>
                    <div class="row">
                        <label for="bMessage">Message</label>
                        <input type="message" name="bMessage" id="bMessage" placeholder="Write us a message" required>
                    </div>
                    <div class="row">
                        <input type="submit" value="Send" name="btnSend" onclick="IgnoreBeforeUnload(); showSnackbar();">
                    </div>
                </form>
            </div>
        </section>
    <?php
    }
    ?>
    <script src="../JavaScript/warning_leaving_page.js"></script>

    <!-- The actual snackbar -->
    <div id="snackbar">Thanks for contacting us!</div>
    <script src="../JavaScript/snackbar.js"></script>

</body>

</html>