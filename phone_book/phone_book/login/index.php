<?php
include("../db_connect.php");
	$errors = array();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if(preg_match("/\S+/", $_POST['fname']) === 0){
		$errors['fname'] = "* First Name is required.";
	}
	if(preg_match("/\S+/", $_POST['lname']) === 0){
		$errors['lname'] = "* Last Name is required.";
	}
	if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
		$errors['email'] = "* Not a valid e-mail address.";
	}
	if(preg_match("/.{8,}/", $_POST['password']) === 0){
		$errors['password'] = "* Password Must Contain at least 8 Chanacters.";
	}
	if(strcmp($_POST['password'], $_POST['confirm_password'])){
		$errors['confirm_password'] = "* Password do not much.";
	}
	
	if(count($errors) === 0){
		$fname = $con-> real_escape_string($_POST['fname']);
		$lname = $con-> real_escape_string($_POST['lname']);
		$email = $con-> real_escape_string($_POST['email']);
		
		$password = hash('sha256', $_POST['password']);
		function createSalt(){
   			$string = md5(uniqid(rand(), true));
    		return substr($string, 0, 3);
		}
		$salt = createSalt();
		$password = hash('sha256', $salt . $password);
		
		$search_query = $con->query("SELECT * FROM members WHERE email = '$email'");
		$num_row = $search_query->num_rows;
		if($num_row >= 1){
			$errors['email'] = "Email address is unavailable.";
		}else{

		
			$msg=mysqli_query($con,"insert into members(fname,lname,email, salt, password) values('$fname','$lname','$email', '$salt', '$password')"); 
		/*
		code to insert data from the registration form into the members table
		


        */
			
			$_POST['fname'] = '';
			$_POST['lname'] = '';
			$_POST['email'] = '';
			$successful = "<h3> You are successfully registered.</h3>";
		}
	}
	}
?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
<title></title>
</head>
<body>
<div id='cssmenu'>
<ul>
      <li><a href='login.php'><span>View Contacts</span></a></li>
   <li><a href='login.php'><span>Search</span></a></li>
    <li><a href='login.php'><span>Log out</span></a></li>
   <li class='last'><a href='#'><span></span></a></li>
   <div class="login">
        <form method="post" action="login.php">
        	<table>
            	<tr>
                	<td><h1>E-mail</h1></td>
                    <td><h1>Password</h1></td>
                </tr>
                <tr>
                	<td><input type="text" name="login_email" id="login_email"></td>
                    <td><input type="password" name="login_password" id="login_password"></td>
                    <td><input type="submit" name="submit" id="login" value="Login"></td>
                </tr>
                <tr>
                	<td colspan="3"><?php if(isset($_GET['message'])){ echo "<h2>" .$_GET['message']. "</h2>"; } ?></td>
                </tr>
            </table>
        </form>
        </div>
</ul>

</div>
	<div id="container">
    	
        <div class="form">
        <form method="post" action="index.php">
        	<table>
            	<tr>
                	<td colspan="2"><?php if(isset($successful)){ echo $successful; } ?></td>
                </tr>
            	<tr>
                	<td><input type="text" name="fname" id="fname" placeholder="First Name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>"></td>
                    <td><input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>"></td>
                </tr>
                <tr>
                	<td><?php if(isset($errors['fname'])){echo "<h2>" .$errors['fname']. "</h2>"; } ?></td>
                    <td><?php if(isset($errors['lname'])){echo "<h2>" .$errors['lname']. "</h2>"; } ?></td>
                </tr>
                <tr">
                	<td colspan="2"><input type="text" name="email" id="email" placeholder="E-mail Address" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['email'])){echo "<h2>" .$errors['email']. "</h2>"; } ?></td>
                </tr>
                <tr>
                	<td colspan="2"><input type="password" name="password" id="pw" placeholder="Password"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['password'])){echo "<h2>" .$errors['password']. "</h2>"; } ?></td>
                </tr>
                <tr>
                	<td colspan="2"><input type="password" name="confirm_password" id="cpw" placeholder="Confirm Password">
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['confirm_password'])){echo "<h2>" .$errors['confirm_password']. "</h2>"; } ?></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" id="submit" value="Sign Up"></td>
                </tr>
            </table>
		</form>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>
