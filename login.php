<?php

session_start();

if(isset($_POST['submit'])){

include_once "db_con.php";
$username='';
$password='';
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
//check for empty fields
  if(empty($username)||empty($password)){
	     header('LOcation: ../login.php?fields=empty');
         exit();  
     }
      else{
    
        $sql="SELECT * FROM tblregister WHERE user_id='$username' OR u_email='$username'";
        $result=mysqli_query($con,$sql);//execute the query
         $checkresult=mysqli_num_rows($result);//it returns how many rows are found
         if($checkresult < 1){
         	//checks the authorised user
         	header('location: ../login.php?invalidusername');
         	exit();
         }        
         else{
               //mysqli_fetch_assoc:it returns the existing  rows and also it fetches data from specified column 
               //it stores the rows as array
               if($rows=mysqli_fetch_assoc($result)){
               	//decrypt the password
                $decrypt_pwd=password_verify($password,$rows['u_confirmpwd']);//password verification
                if($decrypt_pwd==false){
                		header('location: ../login.php?login=Incorrectpassword');
         	            exit();

                }
                elseif($decrypt_pwd==true){
                	//login the user
                	$_SESSION['user_id'] = $rows['u_id'];//session stores the user datas in cookies
                	$_SESSION['user_first'] = $rows['u_first'];
                    $_SESSION['user_last'] = $rows['u_last'];
                    $_SESSION['user_email'] = $rows['u_email'];
                    $_SESSION['user_uid'] = $rows['user_id'];
                     header('location: ../backend/appform.php?login=success');
         	            exit();
                 
                
                
                }

                                    

               }

         }
        




        }






}

?>