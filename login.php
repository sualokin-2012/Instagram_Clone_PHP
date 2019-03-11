<?php

$servername = getenv('IP');
$username = getenv('C9_USER');

$userId = $_POST['userId'];
$password = $_POST['password'];

try {
    $db = new PDO("mysql:dbname=c9;host=$servername", $username, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    
    //$stmt = $db->prepare("SELECT * FROM users WHERE userId='$userId' and password='$password'");
    $stmt = $db->prepare("SELECT * FROM users WHERE userId=:userId and password=:password");
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    
    $result = $stmt->fetchAll();
    $password_hash = $result[0][password];

    // Mysql_num_row is counting table row
    $count=$stmt->rowCount();
    
    $_SESSION['userId'] = '';
    $_SESSION['isValid'] = '';
    // If result matched $username and $password, table row must be 1 row
    if($count==1){
    
    session_start();
    $_SESSION['userId'] = $userId;
    $_SESSION['isValid'] = true;
 
    echo json_encode($result);
    header("Content-type:application/json");
    }
    
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
