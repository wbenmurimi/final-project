<?php
session_start();
$user=$_SESSION['username']; 
if(!$_SESSION["username"]){
// if (!$user) {
 
header("location:/index.html");
}
//else{
//
//// echo "welcome ".$user;  
//}

?>