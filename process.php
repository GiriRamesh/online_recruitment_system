<?php
$username2='';
$email='';
$password='';
$confirm2='';

$con=mysqli_connect('localhost','root','');
if(!$con){
	echo "connection failed";

}
if(!mysqli_select_db($con,'login'))
{
echo 'database not selected';
}


$username2=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
if(isset($_POST['confirmpassword'])){
$confirm2=$_POST['confirmpassword'];
}
$sql="insert into registertbl (username,email,password,confirm)values('$username2','$email','$password','$confirm2')";

if(!mysqli_query($con,$sql))
{
	echo "not inserted";

}
else
{
	echo " registration successful";
}










?>