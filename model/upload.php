<?php
$tempname=$_FILES["poster_icon"]["temp_name"];
$filename=$_FILES["poster_icon"]["name"];
$path="/image.$filename";
move_uploaded_file($tempname, $path);


?>