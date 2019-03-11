<?php
session_start();

$servername = getenv('IP');
$dbUsername = getenv('C9_USER');
$userId = $_SESSION['userId'];
$postId = $_POST["postId"];


try {
    $db = new PDO("mysql:dbname=c9;host=$servername", $dbUsername, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    //$sth = $db->prepare("SELECT a.postId, a.userId, a.comment, b.userName FROM postComment a, users b WHERE a.userId = b.userId and a.postId = '$postId' ORDER BY createDate desc");
    $sth = $db->prepare("SELECT a.postId, a.userId, a.comment, b.userName FROM postComment a, users b WHERE a.userId = b.userId and a.postId = :postId ORDER BY createDate desc");
    $sth->bindParam(':postId', $postId);
    //$sth = $db->prepare("SELECT a.postId, a.userId, a.comment, 'aa' userName FROM postComment a where a.postId = '$postId' ORDER BY createDate desc");
    $sth->execute();
} catch(PDOException $e) {
    echo $e->getMessage();
}
/* Fetch all of the remaining rows in the result set */
$response = $sth->fetchAll();
echo json_encode($response);
header("Content-type:application/json");
?>
