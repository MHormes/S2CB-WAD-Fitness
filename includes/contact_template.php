<?php
include '../includes/connection_template.php';

function SendMessage($name, $email, $message, $userIsLogged)
{
    global $username;
    global $password;
    global $connstring;
    
    try{
        $conn = new PDO($connstring,$username, $password);
        $sql = 'INSERT INTO contact VALUES(:name, :email, :message, :userLogged)';
        $sth = $conn->prepare($sql);
        $sth->execute([':name' => $name, ':email' => $email, ':message' => $message, ':userLogged' => $userIsLogged]);

        $conn= null;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
