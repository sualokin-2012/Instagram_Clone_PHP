<!------------------------------------------------------------------------------    
    Subject: Web Design 
    Project: Instagram Clone
         By: Junghoon Lee, Jihee Kim, Serhii Sukhin
             Created on May 2017
------------------------------------------------------------------------------->


<?php

session_start();

$loginString = '<a href ="javascript:signout();">Log out</a>';

//redirect to login page in case of no session 

if (isset($_SESSION['userId']) && $_SESSION['userId'] == true) {
   $loginString = '<a href ="javascript:signout();">Log out</a>';
} else {
   $loginString = '<a href ="/login.html">Log in</a>';
}



?>
<html>
<head>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/post.css?<?php echo date()  ?>">
<style>


</style>
<script>
 /*global $*/
function signout(){
  Promise.resolve()
      .then(function(){
          return $.post('logout.php');
      })
      .then(function(){
          window.location.replace('login.html');
      })
      .catch(function(err){
          console.log(err);
      });
}
function showContent(likeCount)
{
 // alert(likeCount);
 //alert(this.htmlString);
 
  $(this).html(likeCount);
}
//onload function
function onload(){
  Promise.resolve()
  .then(function(){
    return $.post('getIntroPosts.php');//request posts 
  })
  .then(function (posts){
    
    
    //display Login or Logtout 
    var loginDisplayHtml="";

    loginDisplayHtml = '<?=$loginString?>';
    
    $('#loginDisplay').html(loginDisplayHtml);

    //display post
    var markedUserId = "";
    var rowNum = 0;
    var colIndex = 0;
    var htmlString ="";
    //While going through all posts, just fetch 3 posts from respective users.
    //if posts are less than three, just skip placing div
    //alert(posts);
    posts.forEach(function(post,count){
      //If userId is not equal to the previous userId, start replacing new user Id area with setting markedIndex zero.
      if(markedUserId != post.userId){//new Post 
        colIndex = 0;
        if (count!=0) htmlString += '</div></div>'; 
        markedUserId = post.userId;
      }
      if(colIndex > 2) 
        return;
      if(colIndex == 0){

         var profileImage = "sample.jpg"
         if (post.profileImage != null && post.profileImage != undefined)
         {
           profileImage = post.profileImage;
         }
         htmlString +='<div class="personal_pannel" >'+
                       '<div class="info_icon">'+
                        '<img class="img_person" src="img/profile/'+profileImage+'" alt=""  onclick = "goUserPost(\'' + post.userId + '\');" onMouseOver="this.style.cursor=\'pointer\'">'+
                       '</div>'+
                       '<div class="info_user">'+post.userName+'</div>'+
                       '<div class="gallery_pannel">';      
      }
      
      var likeHtmlString ='<img src="img/icons/like_black.png" width="23px" onclick = "likeClick(\'' + post.id + '\');" onMouseOver="this.style.cursor=\'pointer\'">';
  
      //if user already liked the post, show red like icon.
      var alreadyLiked = false;
      //alert(post.likeIds);
     /*
      post.likeIds.forEach(function(likeId){ 
        //alert(likeId + "==" +loginId);
        if(likeId == loginId ){
          alreadyLiked = true;
          return;
        }
      });   
      
      if(alreadyLiked==true){
        likeHtmlString = '<img  src="img/icons/like_icon.png" width="23px">';
      }
      */
      htmlString += '<div class="gallery_withInfo">' +
                      '<div class="gallery" onMouseOver="javascript:showContent(\'' + post.likeCount + '\');">'+
                        '<img width="100%" height="100%" src="img/upload/'+post.image+'" alt="" >'+
                      '</div>' +
                      '<div class = "comment" align="center">' + 
                        '<span id="likeIcon'+post.id+'">'+ likeHtmlString + '</span>'+
                        '<span id="like'+post.id + '" style="padding-left:15px;font-size:13pt">'+ post.likeCount +'</span><br>'+
                      '</div>' +
                    '</div>';  
      colIndex++;
     
    });
     
    //alert(htmlString);
    $('#posts').append(htmlString);
  })
  .catch(function(err){
    alert(err);
    console.log(err);
  });
}//end of onload()

// like click function
// changes the like icon and increment the like count.
function likeClick(id){
  Promise.resolve()
  .then(function(){
    return $.post('incrLike', {id : id});
  })
  .then(function(like){//if success, toggle the like icon to the red icon.
    $('#like' + like.id).html(like.count);
    $('#likeIcon' + like.id).html('<img  src="img/icons/like_icon.png" width="23px">');
  })
  .catch(function(err){
    console.log(err);
  });
}

function goUserPost(userId){
  window.location.href="userPosts.php?userId="+userId;
}
// like click function end
</script>
</head>
<body onload="onload();">
<!--header section-->  
<div class="header">
  <!--logo display-->
  <div class ="header_log">
  <a href="/introPosts.php">
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
    <a target="_blank" href="">
      <img src="img/icons/header_heart.png" alt=""  >
    </a> 
    </div>
    <div class="signin">
      <span id ='loginDisplay'></span>
    </div>
  </div>
</div>
<!--body section-->
<div class="body">
<!-- under header space -->
<div class="y_space"></div>  
<div  id="posts">
  
</div>
<div class="bottom">
</div>
</body>
</html>
