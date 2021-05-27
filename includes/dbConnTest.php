<?php
include "connection_template.php";
if (isset($_POST['testDB'])) {
    testDBConn();
}

function testDBConn()
{
    global $username;
    global $password;
    global $connstring;
    try {

        $conn = new PDO($connstring, $username, $password);
        $sql = 'SELECT DISTINCT MuscleTrained FROM exercise';

        $query = $conn->query($sql);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}
