<?php
$firstname='';
$lastname='';
$email='';
$password='';
$confirm2='';
$phno='';

//if submit is clicked
if(isset($_POST['submit'])){

include_once 'db_con.php'; // database connection

   //for data security
   //mysqli_real_escape_string:it transfer the data into database safely without any error 
   $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
   $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $password=mysqli_real_escape_string($con,$_POST['password']);
   $confirm2=mysqli_real_escape_string($con,$_POST['confirmpassword']);
   $uid=mysqli_real_escape_string($con,$_POST['userid']) ;
      //if fields are empty
        if(empty($firstname)||empty($lastname)||empty($email)||empty($password)||empty($confirm2)||empty($uid)){
             
           header('Location: ../register.php?signup=empty');
           exit();
           
       }
       else{
               //check whether  the input values are valid or not 
                //preg_match allows only the given characters
                if(!preg_match('/^[a-zA-Z]*$/',$firstname)||!preg_match('/^[a-zA-Z]*$/',$lastname)){
                    
                
                    header('Location: ../register.php?signup=invalid');
                    
                    exit();
                   
                }
               else{
                        //email verification
                        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                          
                            header('Location: ../register.php?signup=invalidemail');
                            exit();
                            
                        }else{
                        	// check the user has same username
                        	$sql="SELECT * FROM tblregister WHERE user_id='$uid' OR u_email='$email'";
                        	$result=mysqli_query($con,$sql);//execute the query
                        	$check=mysqli_num_rows($result);//returns the number of rows are exist
                            if($check>0){
                            	header('Location: ../register.php?signup=userAlreadyexist');
                                exit();
                            
                            }else{
                            	     if(!preg_match('/^[a-zA-z0-9]*$/',$password))
                                    {
                                      //
                                       header('Location: ../register.php?password=requiresspecialcharacters');
                                        exit();
                                      }

                                     else{
                                         if($password!=$confirm2){
                                         //check the passwords are equal
                                    	     header('Location: ../register.php?signup=mismatchedPassword');
                                            exit();
                            
                                    }else
                                    {


                            	        //encrypt the password
                            	        $encrypt_pwd=password_hash($password,PASSWORD_DEFAULT);
                            	
                             	        $encrypt_c_pwd=password_hash($confirm2,PASSWORD_DEFAULT);
                                      $sql="insert into tblregister(u_first,u_last,u_email,u_pwd,u_confirmpwd,user_id)values('$firstname','$lastname','$email','$encrypt_pwd','$encrypt_c_pwd','$uid')";
                               }
                            
                             }

                            }  

                        } 
                               

                     } 
            }

//it checks whether the data is inserted or not
   if(!mysqli_query($con,$sql))
    {
	echo "not inserted";

    }
    else 
   {
	echo " registration successful";
    }
}
else
   {
       header('Location: ../signup.php');
       exit();
   }


?>