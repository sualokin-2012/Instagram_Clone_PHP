<?php

$servername = getenv('IP');
$username = getenv('C9_USER');

$userId = $_POST['userId'];
$password = $_POST['password'];

echo($userId);
echo($password);

$sql = 'UPDATE users SET password=:password WHERE userId=:userId';

try {
    
    $db = new PDO("mysql:dbname=c9;host=$servername", $username, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId',$userId);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
    
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
