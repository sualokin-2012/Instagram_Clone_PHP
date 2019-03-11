<!------------------------------------------------------------------------------    
    Subject: Web Design
    Project: Instagram Clone
         By: Junghoon Lee, Jihee Kim, Serhii Sukhin
         Created on May 2017
------------------------------------------------------------------------------->
<?php
session_start();
//redirect to login page in case of no session 
if(!$_SESSION["userId"]){
    header("Location: login.html");
    exit();
} 
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

function onClickEdit()
{
    /*
    var pop = document.getElementById('popupProfile');
    var editButton = document.getElementById('editButton');
    
    if (pop.style.display == 'none') {
        editButton.innerHTML = 'cancel';
        pop.style.display = 'block';
    } else {
        editButton.innerHTML = 'edit';
        pop.style.display = 'none';
    }
    */
    if($("#popupProfile").is(":visible") == false) {
        $("#editButton").val("cancel");
        $("#popupProfile").delay(200).slideDown(700);
    }
    else if($("#popupProfile").is(":visible") == true) {
        $("#editButton").val("edit");
        $("#popupProfile").delay(200).slideUp(700);
    }
    
}

function showPostComment(postId){

 if($('#commentDiv'+postId).is(":visible") == true) return;
 //in the case of the comment button is ever clicked 
 Promise.resolve()
 .then(function(){
   return $.post('getPostComment.php',{postId:postId});
  })
 .then(function(comments){
   
   $('#commentDiv'+postId).html('');
   var htmlString="";
   comments.forEach(function(comments, count){
      htmlString+=comments.userName+"    "+ comments.comment+"<br>";
      $('#commentDiv'+postId).append(htmlString);
      $('#commentDiv'+postId).delay(400).slideDown(600);
   });
 });
}


function onload(){

 Promise.resolve()
 .then(function(){
     
   return $.post('getMyProfile.php');
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
        '<a target="_blank" href="/myPosts.php">'+
            '<img class = "img_person" src="img/profile/'+profileImage+'" alt="" >'+
        '</a>'+
      '</div>'+
      '<div class="info_user" style="width:80%;" ><span id="userName">'+myProfile.userName+'</span>'+
    
      '<button id="editButton"  onclick="onClickEdit();">Edit</button><br>'+

        '<div id="popupProfile" style="width:80%;">'+
             '<form action="uploadProfile.php" method="post" enctype="multipart/form-data" >'+
                '<table style="width:100%;"><tr>'+
                '<td style="font-size:12px;width:90px">user name</td> '+
                '<td><input type="text" name="userName" id="userName" value="'+myProfile.userName+'" style="height:15px;width:150px"></td>'+
                '<td style="border-width: 2px;" colspan="2" align="left" ><input type="file" style="height:30px;border:0px;width:200px" name="fileToUpload" id="fileToUpload" size="100" ></td>'+      
                '<td><input style="height:30px;width:90px" type="submit" value="upload" ></td></tr>'+
              
             '</form>'+
        '</div>'+
      '</div>';
      
     $('#myProfile').append(profileString);
     
     var pop = document.getElementById('popupProfile');
     pop.style.display = 'none';
 });

 Promise.resolve()
 .then(function(){
   return $.post('getMyPosts.php');
 })
 .then(function(myPosts){
   
   $('#myPosts').html('');
   var htmlString="";
   myPosts.forEach(function(myPost, count){
      htmlString+=
     '<div class="post_withInfo" style="padding-bottom:30px">'+
      '<div class="post">'+
          '<img src="img/upload/'+myPost.image+'" alt="" width="500px" height="500px">'+
      '</div>'+
      // '<div style="padding-left:150px" >'+ myPost.comment+</div>'+
      '<div class="comment" style="padding-left:150px;height:70px">'+
        '<img src="img/icons/postheart.png" alt="" width="20px"  onmouseover="this.style.cursor=\'pointer\'"> '+
        '<img style="margin-left:10px "src="img/icons/tooltip.png" alt="" width="20px" height="20px" onmouseover="this.style.cursor=\'pointer\'" onclick="showPostComment('+myPost.id+');">'+ 
       
      '</div>'+
      '<div id="likeDiv'+ myPost.id+ '" style="padding-left:150px;display:none"></div>'+
      '<div id="commentDiv'+ myPost.id+ '" style="padding-left:150px;color:#808080;display:none"></div>'+
    '</div>';
   });
  
   //$('#userName').html(userName);
   $('#myPosts').append(htmlString);
 });
}
</script>
</head>
<body onload="onload()">
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
    <button class="post_button" onclick="handleUploadPost();">POST</button>
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