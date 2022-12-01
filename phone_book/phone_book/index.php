<?php
include("auth.php");
include("db_connect.php");
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
	if(preg_match("/^[0-9]{9}/", $_POST['phone1']) === 0){
		$errors['phone1'] = "* Enter valid phone number e.g 0979100245.";
	}
		if(preg_match("/^[0-9]{9}/", $_POST['phone2']) === 0){
		$errors['phone2'] = "* Enter valid phone number e.g 0979100245.";
	}

		if(preg_match("/^[0-9]{9}/", $_POST['phone3']) === 0){
		$errors['phone3'] = "* Enter valid phone number e.g 0979100245.";
	}
	if(preg_match("/^[0-9]{9}/", $_POST['whatsapp']) === 0){
		$errors['whatsapp'] = "* Enter valid phone number e.g 0979100245.";
	}


	if(count($errors) === 0){
		$fname = $con->real_escape_string($_POST['fname']);
		$lname = $con->real_escape_string($_POST['lname']);
		$phone1 = $con->real_escape_string($_POST['phone1']);
		$phone2 = $con->real_escape_string($_POST['phone2']);
		$phone3 = $con->real_escape_string($_POST['phone3']);
		$email = $con->real_escape_string($_POST['email']);
		$whatsapp = $con->real_escape_string($_POST['whatsapp']);

	$sql = "INSERT INTO new_record(fname, lname, phone1, phone2, phone3, email, whatsapp) VALUES('$fname', '$lname', '$phone1', '$phone2', '$phone3', '$email', '$whatsapp')";
	$query=mysqli_query($con,$sql); 
	

		
/*
code to insert collected data from the form into the new_record table







*/
			$_POST['fname'] = '';
			$_POST['lname'] = '';
			$_POST['phone1'] = '';
			$_POST['phone2'] = '';
			$_POST['phone3'] = '';
			$_POST['email'] = '';
			$_POST['whatsapp'] = '';
			
			$successful = "<h3> Contacts successfully uploaded.</h3>";
		
	 }
   }
?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="login/css/style.css">
<title></title>
</head>
<body>
<div id='cssmenu'>
<ul>
      <li><a href='table.php'><span>View Contacts</span></a></li>
   <li><a href='search_form.php'><span>Search</span></a></li>
    <li><a href='login/logout.php'><span>Log out</span></a></li>
   <li class='last'><a href='#'><span></span></a></li>
</ul>
</div>

	<div id="container">
    	
        <div class="form">
		<h1> ENTER CONTACT DETAILS TO BE ADDED TO PHONE BOOK </h1>
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
                	<td colspan="2"><input type="text" name="phone1" id="phone1" placeholder="Phone 1" value="<?php if(isset($_POST['phone1'])){echo $_POST['phone1'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['phone1'])){echo "<h2>" .$errors['phone1']. "</h2>"; } ?></td>
                </tr>
				  <tr">
                	<td colspan="2"><input type="text" name="phone2" id="phone1" placeholder="Phone 2" value="<?php if(isset($_POST['phone2'])){echo $_POST['phone2'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['phone2'])){echo "<h2>" .$errors['phone2']. "</h2>"; } ?></td>
                </tr>
                <tr">
                	<td colspan="2"><input type="text" name="phone3" id="phone3" placeholder="Phone 3" value="<?php if(isset($_POST['phone3'])){echo $_POST['phone3'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['phone3'])){echo "<h2>" .$errors['phone3']. "</h2>"; } ?></td>
					
                </tr>
				<tr">
                	<td colspan="2"><input type="text" name="email" id="email" placeholder="E-mail Address" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['email'])){echo "<h2>" .$errors['email']. "</h2>"; } ?></td>
                </tr>
			    <tr">
                	<td colspan="2"><input type="text" name="whatsapp" id="whatsapp" placeholder="whatsapp" value="<?php if(isset($_POST['whatsapp'])){echo $_POST['whatsapp'];} ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><?php if(isset($errors['whatsapp'])){echo "<h2>" .$errors['whatsapp']. "</h2>"; } ?></td>
                </tr>
			  
			  
			  
                <tr>
                    <td><input type="submit" name="submit" id="submit" value="Submit"></td>
                </tr>
            </table>
		</form>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>
