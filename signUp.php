<?php

$servername = getenv('IP');
$username = getenv('C9_USER');

$userId = $_POST['userId'];
$userName = $_POST['userName'];
$password = $_POST['password'];


$sql = 'INSERT INTO users ('.
        'userId, userName, password, registerDate)'. 
        'VALUES (:userId, :userName, :password, now())';

try {
    
    $db = new PDO("mysql:dbname=c9;host=$servername", $username, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId',$userId);
    $stmt->bindParam(':userName',$userName);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
    
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
