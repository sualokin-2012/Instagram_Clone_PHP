<?php

session_start();

$servername = getenv('IP');
$dbUsername = getenv('C9_USER');

$postId = $_POST['postId'];//post ID which a user want to like 
$userId = $_POST['userId'];//user who do like  post
//$comment = $_POST['comment'];
$sql = 'INSERT INTO postLike ('.
        'postId, userId, createDate)'. 
        'VALUES (:postId, :userId, now())';
        
try {
    $db = new PDO("mysql:dbname=c9;host=$servername", $dbUsername, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':postId',$postId);
    $stmt->bindParam(':userId',$userId);
    $stmt->execute();
    
} catch(PDOException $e) {
    echo $e->getMessage();
}

/* Fetch all of the remaining rows in the result set */
$response = $stmt->result;
echo json_encode($response);
header("Content-type:application/json");
?>
