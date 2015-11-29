<?php
/**
*@author Jude Benson Wachira
*@version 0.0.1
*/
include "adb.php";

class Comment extends adb{
    /**
     * @method boolean addMyPost($name,$description,$date,$poster,$user)
     *
     * @return bool
     **/
    function addMyComment($postId,$coment,$user)
    {
        $str_query = "INSERT INTO comments(post_id, comment_detail,commented_by) 
        VALUES('$postId','$coment','$user')";
        return $this->query($str_query);
    }
    function viewComments($postId)
    {
        $str_query = "SELECT * FROM comments where post_id='$postId'";
        return $this->query($str_query);
    }

    function editComments($name,$description,$date,$poster)
    {
     $str_query = "UPDATE posts SET event_name='$name', description='$description',event_time='$date',poster='$poster'
      userid= WHERE item_number='$number'";
     return $this->query($str_query);
 }
    
    function deletePost($id)
    {
        $str_query="DELETE FROM comments WHERE comment_id='$id'";
        return $this->query($str_query);
    }
   
   
      
      function getMyComments($userId)
      {
        $str_query = "SELECT * FROM comments where commented_by='$userId'";
        return $this->query($str_query);
    }
}

?>
