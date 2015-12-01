<?php
/**
*@author Jude Benson Wachira
*@version 0.0.1
*/
include "adb.php";

class user extends adb{
    /**
     * @method boolean Login($username, $user_password) username and password to enable user to log in
     * @param $username
     * @param $user_password
     * @return bool
     */
    function Login($username, $user_password)
    {
        $str_query = "SELECT * FROM xx_user WHERE user_name = '$username' AND user_pass = md5('$user_password')";
        return $this->query($str_query);
    }
    /**
     * @method boolean signUp($username,$password,$yeargroup,$phone) sign up information of user to be stored in the database
     * @param $username name user will sign in with
     * @param $password password of user
     * @param $yeargroup year group of user
     * @param $phone phone number of user
     * @return bool
     */
    function signUp($username,$password,$yeargroup,$phone,$usertype)
    {
        $str_query = "INSERT INTO xx_user SET user_name='$username', user_pass=md5('$password'),year_group='$yeargroup',user_phone='$phone',user_type='$usertype'";
        return $this->query($str_query);
    }
    function getUsers()
    {
        $str_query = "SELECT * FROM xx_user order by user_type";
        return $this->query($str_query);
    }
    function editUserType($type,$id)
    {
         $str_query = "UPDATE xx_user SET user_type='$type'
      WHERE user_id='$id'";
     return $this->query($str_query);
    }
   
}
?>
