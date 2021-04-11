<?php
function GetUserDetails($userUsername)
{
    include '../includes/connection_template.php';
    include '../php classes/User.php';
    try{

        $conn = new PDO("mysql:host=studmysql01.fhict.local;dbname=dbi459847",$username, $password);
        $sql = 'SELECT * FROM user WHERE UserName = :userUsername';
        $sth = $conn->prepare($sql);
        $sth->execute([':userUsername' => $userUsername]);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        $newUser = new User($result[0]->FirstName, $result[0]->SecondName, $result[0]->UserName, $result[0]->Password, $result[0]->Email, $result[0]->Role);
        return $newUser;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
