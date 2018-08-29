<?php

include_once 'db_con.php';

if(isset($_POST['submit'])){
     session_unset();//this func destroys the session variables
     session_destroy();//this function stops the session

	header('location: ../1login.php');
	exit();
}


?>
