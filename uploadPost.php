<?php
session_start();

//upload file
$target_dir = "img/upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //save into db
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        
        $image = basename( $_FILES["fileToUpload"]["name"]);
        $userId = $_SESSION['userId'];
        $comment = $_POST['comment'];
        $sql = 'INSERT INTO posts ('.
                'userId, image, comment, createDate)'. 
                'VALUES (:userId, :image, :comment, now())';
        
        try {
            $db = new PDO("mysql:dbname=c9;host=$servername", $username, "" );
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':userId',$userId);
            $stmt->bindParam(':image',$image);
            $stmt->bindParam(':comment',$comment);
            $stmt->execute();
            header("Location: myPosts.php");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>