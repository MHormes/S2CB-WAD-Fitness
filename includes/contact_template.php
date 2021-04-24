<?php
include '../includes/connection_template.php';

function SendMessage($name, $email, $message)
{
    global $username;
    global $password;
    global $connstring;
    
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO contact VALUES(:name, :email, :message)';
        $sth = $conn->prepare($sql);
        $sth->execute([':name' => $name, ':email' => $email, ':message' => $message]);

        $_SESSION['Username'] = $uusername;

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
