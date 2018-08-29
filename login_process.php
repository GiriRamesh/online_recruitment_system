<?php

$username='';
$password='';




$con=mysqli_connect('localhost','root','');
if(!$con){
	echo "connection failed";

}
if(!mysqli_select_db($con,'login'))
{
echo 'database not selected';
}

$username=$_POST['username'];
$password=$_POST['password'];

$sql="select password from registertbl where password=$password";


if($_POST['password']==$sql)
{
	echo "authorised user";
}
else
{
	echo "unauthorised user";
}


if(!mysqli_query($con,$sql))
{
	echo "unauthorised user";
}
else
{
	echo "Authorised user ";
}






?>