<?php
/**
*@author Jude Benson Wachira
*@version 0.0.1
*/
include "adb.php";

class Post extends adb{
    /**
     * @method boolean addMyPost($name,$description,$date,$poster,$user)
     *
     * @return bool
     **/
    function addMyPost($name,$description,$date,$poster,$user)
    {
        $str_query = "INSERT INTO posts(event_name, description, event_time, poster, posted_by) 
        VALUES('$name','$description','$date','$poster','$user')";
        return $this->query($str_query);
    }
    function viewPosts()
    {
        $str_query = "SELECT * FROM posts order by post_time DESC LIMIT 10";
        return $this->query($str_query);
    }
    function viewUpcomingEvents()
    {
        $str_query = "SELECT * FROM posts where event_time>=cast(NOW() as date) order by (event_time-cast(NOW() as date)) ASC LIMIT 4 ";
        return $this->query($str_query);
    }
    function editPost($name,$description,$date,$poster,$postId)
    {
     $str_query = "UPDATE posts SET event_name='$name', description='$description',event_time='$date',poster='$poster'
      WHERE post_id='$postId'";
     return $this->query($str_query);
 }
    
    function deletePost($id)
    {
        $str_query="DELETE FROM posts WHERE post_id='$id'";
        return $this->query($str_query);
    }
   
    function searchPost($searchItem)
    {
        
        $str_query="SELECT * FROM posts WHERE event_name LIKE '%$searchItem%' OR description LIKE '%$searchItem%'
        OR event_time LIKE '%$searchItem%' OR poster LIKE '%$searchItem%";
        return $this->query($str_query);
    }
      
      function getMyPosts($userId)
      {
        $str_query = "SELECT * FROM posts where posted_by='$userId' order by post_time DESC LIMIT 5";
        return $this->query($str_query);
    }
    function editLikes($like,$postId)
    {
      $str_query = "UPDATE posts SET post_likes='$like'WHERE post_id='$postId'";
     return $this->query($str_query); 
    }
    function viewOnePost($postId)
    {
      $str_query = "SELECT * FROM posts where post_id='$postId'";
        return $this->query($str_query);
    }
}

?>
