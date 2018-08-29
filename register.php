
<!doctype html>
<html>
<head>
	<title>LOGIN page</title>
    <meta http-equiv=”refresh” content=”5" />
    <link rel="stylesheet" type="text/css" href="reg_style.css">
</head>
<body>
	<div class="login_box">
	<form action= "backend/signup.php" method ="post">
	<h2>REGISTER HERE</h2>
	
	<p>First name</p>
	<input type="text" name="firstname" placeholder="enter the name">
	<P>Last name</P>
	<input type="text" name="lastname" placeholder="enter email here">
     <p>Email</p>
     <input type="text" name="email" placeholder="enter email here">
   
	<p>password</p>
	<input type="text" name="password" placeholder="enter the password">
	<p>confirm password</p>
	<input type="text" name="confirmpassword" placeholder="enter the password again">
   <p>username</p>
   <input type="text" name="userid" placeholder="phone number" >

	<br></br>
	<input type="submit" name="submit" value="Register">
	<input type="submit" name="cancel" value="cancel">
   </br>
 Already have an acount<a href="1login.php">sign in</a> 
  </form>
</div>
</body>
</html>