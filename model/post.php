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
        $str_query = "SELECT * FROM posts";
        return $this->query($str_query);
    }

    function editPost($name,$description,$date,$poster)
    {
     $str_query = "UPDATE posts SET event_name='$name', description='$description',event_time='$date',poster='$poster'
      userid= WHERE item_number='$number'";
     return $this->query($str_query);
 }
    
    function deletePost($id,$postedBy)
    {
        $str_query="DELETE FROM posts WHERE post_id='$id' AND posted_by='$postedBy'";
        return $this->query($str_query);
    }
   
    function searchPost($searchItem){
        
        $str_query="SELECT * FROM posts WHERE event_name LIKE '%$searchItem%' OR description LIKE '%$searchItem%'
        OR event_time LIKE '%$searchItem%' OR poster LIKE '%$searchItem%";
        return $this->query($str_query);
    }
      
      function getMyPosts($userId)
      {
        $str_query = "SELECT * FROM posts where posted_by='$userId'";
        return $this->query($str_query);
    }
}

?>
