<?php
error_reporting(-1);
session_start();

$servername = getenv('IP');
$dbUsername = getenv('C9_USER');
$userId = $_POST['userId'];

try {
    $db = new PDO("mysql:dbname=c9;host=$servername", $dbUsername, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

} catch(PDOException $e) {
    echo $e->getMessage();
}

//$sth = $db->prepare("SELECT * FROM posts WHERE userId = '$userId' ORDER BY createDate desc");
$sth = $db->prepare("SELECT * FROM posts WHERE userId = :userId ORDER BY createDate desc");
$sth->bindParam(':userId', $userId);
$sth->execute();

/* Fetch all of the remaining rows in the result set */
$response = $sth->fetchAll();
header("Content-type:application/json");
echo json_encode($response);

?>
