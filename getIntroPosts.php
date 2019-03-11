<?php
session_start();

$servername = getenv('IP');
$username = getenv('C9_USER');

try {
    $db = new PDO("mysql:dbname=c9;host=$servername", $username, "" );
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

} catch(PDOException $e) {
    echo $e->getMessage();
}
$sql = "select p.id, p.image, p.comment, u.userId, u.userName, u.image as profileImage, count(pl.postId) as likeCount ".
       "from posts p ".
       "inner join users u on p.userId = u.userId ".
       "left join postLike pl on p.id = pl.postId ". 
       "group by p.id ".
       "order by u.userName, p.createDate desc";
       $sth = $db->prepare($sql);
//$sth = $db->prepare("select u.userName,u.image as profileImage, p.userId, p.id, p.image, p.comment from posts p, users u where p.userId = u.userId order by userId, createDate desc");
$sth->execute();

/* Fetch all of the remaining rows in the result set */
$response = $sth->fetchAll();
header("Content-type:application/json");
echo json_encode($response);
//
?>
