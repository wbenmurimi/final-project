<?php
session_start();
ob_start();

if(!isset($_REQUEST['cmd'])){
	echo '{"result": 0, "message": "Unknown command"}';
	return;
}

$cmd = $_REQUEST['cmd'];

switch ($cmd) {
	case 1:
  login();
  break;
  case 2:
  userSignUp();
  break;
  case 3:
  logout();
  break;
  case 4:
  addpost();
  break;
  case 5:
  getAllPosts();
  break;
  case 6:
  editPost();
  break;
  case 7:
  deletePost();
  break;
  case 8:
  getMyPosts();
  break;
  case 9:
  addComment();
  break;
  case 10:
  getAllComments();
  break;
  case 11:
  addLikes();
  break;
  case 12:
  getUpcomingPosts();
  break;
  case 13:
  getEditPost();
  break;
  case 14:
  getAppUsers();
  break;
  case 15:
  editUserType();
  break;
  case 16:
  sendMessage();
  break;
  default:
  echo '{"result": 0, "message": "Unknown command"}';
  return;
  break;
}


function login(){
	include "user.php";

  $myuser = new user();

  $username = $_GET['username'];
  $password = $_GET['password'];
  $myuser->Login($username, $password);
  $row=$myuser->fetch();

  if($row){
    session_destroy();
    session_start();

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    echo '{"result": 1, "user": [';
    while($row){
      echo json_encode($row);
      $row = $myuser->fetch();
      if($row){
        echo ',';
      }
    }
    echo "]}";
    return; 
  }
  echo '{"result": 0, "message": "Wrong details! Please try again"}';
  return;

}


function userSignUp(){
  include "user.php";

  $myuser = new user();
  $username = $_GET['username'];
  $password = $_GET['password'];
  $phone = $_GET['phone'];
  $yeargroup = $_GET['year'];
  $usertype="regular";

  if(!$myuser->signUp($username,$password,$yeargroup,$phone,$usertype)){
    echo '{"result": 0, "message": "User not created"}';
    return;
  }
  echo '{"result": 1, "message": "Sign up was successful"}';

  return;
}

function logout(){

  if(!$_SESSION['username']){
    echo '{"result": 0, "message": "The user is not loged in"}';
    return;
  }
  session_destroy();
  echo '{"result": 1, "message": "The user Loged out successfully"}';
  return;
}
/**
*Method to add a post to the database
*/
function addpost(){
  include "post.php";

  $post = new Post();

  // $name = $_GET['name'];
  // $description = $_GET['description'];
  // $date = $_GET['date'];
  // $poster = $_GET['poster'];
  // $user= $_SESSION['username'];

  $name = $_REQUEST['ename'];
  $description = $_REQUEST['description'];
  $date = $_REQUEST['edate'];
  // $poster = $_REQUEST['poster'];
  $user= $_SESSION['username'];
// postername
  $tempname=$_FILES["poster_icon"]["temp_name"];
  $filename=$_FILES["poster_icon"]["name"];
  $path="/image.$filename";
  move_uploaded_file($tempname, $path);

  if(!$post->addMyPost($name,$description,$date,$filename,$user)){
    echo '{"result": 0, "message": "post was not added"}';
    return;
  }
  echo '{"result": 1, "message": "post was added successfully"}';

  return;
}


/**
*Function to return all the posts in the database
*/
function getAllPosts(){
  include "post.php";

  $post = new Post();
  $row = $post->viewPosts();
  if(!$row){
    echo '{"result": 0, "message": "You have no posts in the database"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Function to return the upcoming posts in the database
*/
function getUpcomingPosts(){
  include "post.php";

  $post = new Post();
  $row = $post->viewUpcomingEvents();
  if(!$row){
    echo '{"result": 0, "message": "You have no upcoming events in the database"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}
/**
*Method to edit a post to the database
*/
function editPost(){
 include "post.php";

 $post = new Post();

 $name = $_GET['name'];
 $description = $_GET['description'];
 $date = $_GET['date'];
 $poster = $_GET['poster'];
 $id = $_GET['id'];

 if(!$post->editPost($name,$description,$date,$poster,$id)){
  echo '{"result": 0, "message": "Post was not edited"}';
  return;
}
echo '{"result": 1, "message": "Post was edited successfully"}';

return;
}

function getEditPost(){
  include "post.php";

  $post = new Post();
  $postId = $_GET['id'];
  $row = $post->viewOnePost($postId);
  if(!$row){
    echo '{"result": 0, "message": "You have no posts in the database"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to delete a post from the database
*/
function deletePost(){
  include "post.php";

  $post = new Post();
  $postId = $_GET['id'];

  if(!$post->deletePost($postId)){
    echo '{"result": 0, "message": "Post was not deleted "}';
    return;
  }
  echo '{"result": 1, "message": "Post was deleted successful"}';

  return;
}
/**
*Method to fetch posts that have been made by a user
*/
function getMyPosts(){
  include "post.php";

  $post = new Post();
    // $userId=$_GET['username'];
  $userId=$_SESSION['username'];
  $row = $post->getMyPosts($userId);
  if(!$row){
    echo '{"result": 0, "message": "You have not made any posts"}';
    return;
  }

  echo '{"result": 1, "post": [';
  while($row){
    echo json_encode($row);
    $row = $post->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}
function getAppUsers(){
  include "user.php";

  $user = new user();

  $row = $user->getUsers();
  if(!$row){
    echo '{"result": 0, "message": "You have no active users"}';
    return;
  }

  echo '{"result": 1, "user": [';
  while($row){
    echo json_encode($row);
    $row = $user->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to add a post to the database
*/
function addComment(){
 include "comment.php";

 $comm = new Comment();

 $postId = $_GET['id'];
 $comment = $_GET['description'];
 $user= $_SESSION['username'];

 if(!$comm->addMyComment($postId,$comment,$user)){
  echo '{"result": 0, "message": "Comment was not added"}';
  return;
}
echo '{"result": 1, "message": "Comment was added successfully"}';

return;
}


/**
*Function to return all the posts in the database
*/
function getAllComments(){
  include "comment.php";

  $comment = new Comment();
  $postId = $_GET['id'];
  $row = $comment->viewComments($postId);
  if(!$row){
    echo '{"result": 0, "message": "You have no comments in this post"}';
    return;
  }

  echo '{"result": 1, "comment": [';
  while($row){
    echo json_encode($row);
    $row = $comment->fetch();
    if($row){
      echo ',';
    }
  }
  echo "]}";
  return;
}

/**
*Method to add likes to the database
*/
function addLikes(){
 include "post.php";

 $post = new Post();

 $like = $_GET['likes'];
 $postId = $_GET['id'];

 if(!$post->editLikes($like,$postId)){
  echo '{"result": 0, "message": "You did not like"}';
  return;
}
echo '{"result": 1, "message": "You liked this post"}';

return;
}

function editUserType(){
 include "user.php";

 $user = new user();

 $type = $_GET['user'];
 $id = $_GET['id'];

 if(!$user->editUserType($type,$id)){
  echo '{"result": 0, "message": "User type was not edited"}';
  return;
}
echo '{"result": 1, "message": "User type was edited successfully"}';

return;
}

function sendMessage(){
 $phone = $_GET['phone'];
 include "smsGateway.php";
 $smsGateway = new SmsGateway('wbenmurimi@gmail.com', 'murimi2015');

 $deviceID = 14246;
 $number = '+'.$phone;
 $message = 'Download Mushene app from www.benanconstruction.com and get ontime updates of campus events';

 $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

}
function getuserSession(){
  if(!$_SESSION["username"]){
    echo '{"result": 0, "message": "No session stored"}';
    return;  
  }
  echo '{"result": 1, "message": "'.$_SESSION["username"].'"}';

  return;

}
ob_end_flush();

?>
