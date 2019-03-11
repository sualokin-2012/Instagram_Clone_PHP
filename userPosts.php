<!------------------------------------------------------------------------------    
    Subject: Web Design
    Project: Instagram Clone
         By: Junghoon Lee, Jihee Kim, Serhii Sukhin
         Created on Sep 2017
------------------------------------------------------------------------------->
<?php
//error_reporting(-1);
session_start();
//redirect to login page in case of no session 

if(!$_SESSION["userId"]){
    header("Location: login.html");
    exit();
} 
$userParam = $_GET["userId"];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/myPost.css">
<script src="js/jquery.min.js"></script>
<script>
function logout(){
  
  $.post('logout.php');
   Promise.resolve()
        .then(function(){
            return $.post('logout.php');
        })
        .then(function(){
            window.location= "login.html";
        })
        .catch(function(err){
            console.log(err);
        })
}
//go to the page to write a post
function handleUploadPost(){
   window.location.replace('uploadPost.html');
}
//like post 
function likePost(postId){
  
    //post("likePost", { postId:postId, userId:'<?php echo $userParam;?>'})
    var loginId = '<?php echo $_SESSION["userId"];?>';
    if(loginId==''){
       window.location.href = "login.html";
    }
    Promise.resolve()
    .then(function(){
       return $.post('likePost.php', {postId:postId, userId:'<?php echo $userParam;?>'});
    })
    .then(function (myProfile){
    //alert();
    });
}
function showPostComment(postId){//also called in myPost.php

 //if($('#commentDiv'+postId).is(":visible") == true) return;
 //in the case of the comment button is ever clicked 

 Promise.resolve()
 .then(function(){
   return $.post('getPostComment.php',{postId:postId});
  })
 .then(function(comments){
   var htmlString="";
   //alert("length:"+comments.length);
   //$('#commentDiv'+postId).empty();
   //document.getElementById("commentDiv"+postId).innerHTML = "";
   comments.forEach(function(comments, count){
      //alert("html:"+$('#commentDiv'+postId).val());
      htmlString+=comments.userName+"     "+ comments.comment+"<br>";
   });
   document.getElementById("commentDiv"+postId).innerHTML = "";
   $('#commentDiv'+postId).append(htmlString);
   $('#commentDiv'+postId).delay(400).slideDown(600);
 });
}
//write comment 
function writeComment(postId)
{
   // alert("writeComment");
    //post("likePost", { postId:postId, userId:'<?php echo $userParam;?>'})
    var loginId = '<?php echo $_SESSION["userId"];?>';
    //alert(loginId);
    if(loginId==''){
       window.location.href = "login.html";
    }
    Promise.resolve()
    .then(function(){
       var commentStr = document.getElementById('commentInput'+postId).value;
       return $.post('writeComment.php', {postId:postId, userId:'<?php echo $userParam;?>',comment:commentStr});
    })
    .then(function (myProfile){
        showPostComment(postId);
    });
    
}
//onload function
function onload(){
 Promise.resolve()
 .then(function(){
   return $.post('getUserProfile.php',{userId:'<?php echo $userParam;?>'});
 })
 .then(function (myProfile){

     
     var profileString = "";
     var profileImage = "sample.jpg"
     if (myProfile.image != null && myProfile.image != undefined)
     {
       profileImage = myProfile.image;
     }
     profileString += 
     '<div class="info_icon">'+
        '<a target="_blank" href="/userPosts.php?userId=<?php echo $userParam;?>">'+
            '<img class = "img_person" src="img/profile/'+profileImage+'" alt="" >'+
        '</a>'+
      '</div>'+
      '<div class="info_user"><span id="userName">'+myProfile.userName+'</span></div>';
      
     $('#myProfile').append(profileString);
 });
 Promise.resolve()
 .then(function(){
   return $.post('getUserPosts.php',{userId:'<?php echo $userParam;?>'});
 })
 .then(function(myPosts){
   
   $('#myPosts').html('');
   var htmlString="";
   myPosts.forEach(function(myPost, count){
      htmlString+=
     '<div class="post_withInfo">'+
      '<div class="post">'+
          '<img src="img/upload/'+myPost.image+'" alt="" width="500px" height="500px">'+
      '</div>'+
      '<div class="comment" style="padding-left:150px;height:70px;margin:auto">'+
        '<img src="img/icons/postheart.png" alt="" width="20px"  onmouseover="this.style.cursor=\'pointer\'" onclick="likePost('+myPost.id+');"> '+
        '<img style="margin-left:10px "src="img/icons/tooltip.png" alt="" width="20px" height="20px" onmouseover="this.style.cursor=\'pointer\'" onclick="showPostComment('+myPost.id+');">'+ 
        '<input type="text" id="commentInput'+myPost.id+'" placeholder="comment" style="text-decoration:underline;margin-left:30px;margin-top:10px;width:400px;color:#808080" onkeydown="if(event.keyCode == 13) writeComment('+myPost.id+');" >'+ 
         '</div>'+  
      '<div id="likeDiv'+ myPost.id+ '" style="padding-left:150px;display:none"></div>'+
      '<div id="commentDiv'+ myPost.id+ '" style="padding-left:150px;color:#808080;display:none;padding-bottom:20px;float:left"></div>'+
 
    '</div>';
   });
   $('#myPosts').append(htmlString);
 });
}
 </script>

</head>
<body onload="onload();">
<div class="header">
  <!--logo display-->
  <div class ="header_log">
  <a href="introPosts.php">
    <img src="img/icons/insta_logo.PNG" alt="" width="" height="">
  </a>
  </div>
  <!--search display-->
  <div class ="header_search">  
    <input type="text" id="search_name" placeholder="Search" style="width:60%;margin:15px">
  </div>
  <!-- icon display -->
  <div class ="header_icons" >
    <div class="icon">
    <a href="/myPosts.php">
      <img src="img/icons/header_person.png" alt="" >
    </a> 
    </div>
    <div class="icon"> 
    <a target="_blank" href='javascript:signout();'>
      <img src="img/icons/header_heart.png" alt=""  >
    </a> 
    </div>
    <div class="signin">
      <a href ='javascript:logout();'>Log out</a>
    </div>
  </div>
</div>
<!--body section-->
<div class="body">
<!-- under header space -->
  <div class="y_space">
  </div> 
  <div class="div_post_button">
  </div>
  <div class="personal_pannel" id="myProfile">
  </div>
  <div class="personal_pannel" id="myPosts">
  </div>
</div>
<div class="bottom">
</div>


</body>
</html>
