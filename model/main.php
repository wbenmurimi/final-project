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
   echo '{"result": 1, "message": "Sign in successful"}';
//        
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
    $name = $_GET['name'];
    $description = $_GET['description'];
    $date = $_GET['date'];
    $poster = $_GET['poster'];
    $user= "ben";

    if(!$post->addMyPost($name,$description,$date,$poster,$user)){
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
*Method to edit a post to the database
*/
function editPost(){
   include "post.php";

    $post = new Post();

    $name = $_GET['name'];
    $description = $_GET['description'];
    $date = $_GET['date'];
    $poster = $_GET['poster'];

    if(!$post->editPost($name,$description,$date,$poster)){
        echo '{"result": 0, "message": "Post was not edited"}';
        return;
    }
    echo '{"result": 1, "message": "Post was edited successfully"}';

    return;
}

/**
*Method to delete a post from the database
*/
function deletePost(){
    include "post.php";

    $post = new Post();
    $postId = $_GET['id'];
    $postedBy=$_GET['username'];

    if(!$post->deletePost($postId,$postedBy)){
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
    $userId=$_GET['username'];
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

/**
*Method to add a post to the database
*/
function addComment(){
   include "comment.php";

    $comment = new Comment();

    $postId = $_GET['id'];
    $comment = $_GET['description'];
    $user= "ben";

    if(!$comment->addMyComment($postId,$coment,$user)){
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
    $row = $comment->viewComments();
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
