<?php
include '../includes/connection_template.php';
function GetUserDetails($userUsername)
{
    global $username;
    global $password;
    global $connstring;
    include '../php classes/User.php';
    try{

        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM user WHERE UserName = :userUsername';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        $newUser = new User($result[0]->FirstName, $result[0]->SecondName, $result[0]->UserName, $result[0]->Password, $result[0]->Email, $result[0]->Role);
        return $newUser;
    }catch(PDOException $e){
        echo false;
    }
}

function UpdateAccount($oldUsername, $firstName, $secondName, $uusername, $upassword, $email)
{
    global $username;
    global $password;
    global $connstring;
    
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'UPDATE user SET FirstName = :firstName, SecondName = :secondName, UserName = :username, Email = :email, Password = :password WHERE UserName = :userToUpdate';
        $sth = $conn->prepare($sql);
        $sth->execute([':firstName' => $firstName, ':secondName' => $secondName, ':username' => $uusername, ':password' => $upassword, ':email' => $email, ':userToUpdate' => $oldUsername]);

        $_SESSION['Username'] = $uusername;

        $conn= null;
    }catch(PDOException $e){
        echo false;
    }
}

function loginAccount($userusername, $userpassword)
{
    global $username;
    global $password;
    global $connstring;

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'SELECT * FROM user WHERE Username = :username AND Password = :password';
        $sth = $conn->prepare($sql);

        $sth->execute(
            array(
                ':username' => $userusername,
                ':password' => $userpassword
            )
        );
        $users = $sth->fetchAll();
        $count = $sth->rowCount();

        if ($count > 0) {
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['Password'] = $_POST["password"];
            $_SESSION['Username'] = $_POST["username"];
            setcookie('loginMessage', "", 1);
            header('Location: mypage.php');
            return true;
        } 
        else {
            setcookie('loginMessage', "Login unsucessfull");
            header('Location: login.php');
            return false;
        }

    }catch(PDOException $e){
        echo false;
    }
}

function CreateAccount($firstName, $secondName, $uusername, $upassword, $email)
{
    global $username;
    global $password;
    global $connstring;

    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO user VALUES(:firstName, :secondName, :username, :email, :password, :role)';
        $sth = $conn->prepare($sql);
        $sth->execute([':firstName' => $firstName, ':secondName' => $secondName, ':username' => $uusername, ':password' => $upassword, ':email' => $email, ':role' => 'member']);
        $_SESSION['UsernameReg'] = $_POST["username"];
        header('Location: login.php');
        $conn = null;
    }catch(PDOException $e){
        $_SESSION['failed'] = 'true';
        return false;
    }
}
