<?php
include("auth.php");
include("db_connect.php");
$errors = array();

$id = $_REQUEST['id'];
if (isset($_REQUEST['id'])) {
	$con = new mysqli('localhost', 'root', '', 'phone_book');
	if ($con->connect_error) {
		echo "couldn't connect";
		die();
	}
	$query = "select * from new_record where id = '$id'";
	$result = $con->query($query) or die("querry failed" . $con->error);

	while ($row = $result->fetch_assoc()) {
		$fname = $row['fname'];
		$lname = $row['lname'];
		$phone1 = $row['phone1'];
		$phone2 = $row['phone2'];
		$phone3 = $row['phone3'];
		$email = $row['email'];
		$whatsapp = $row['whatsapp'];
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (preg_match("/\S+/", $_POST['fname']) === 0) {
			$errors['fname'] = "* First Name is required.";
		}
		if (preg_match("/\S+/", $_POST['lname']) === 0) {
			$errors['lname'] = "* Last Name is required.";
		}
		if (preg_match("/.+@.+\..+/", $_POST['email']) === 0) {
			$errors['email'] = "* Not a valid e-mail address.";
		}
		if (preg_match("/^[0-9]{9}/", $_POST['phone1']) === 0) {
			$errors['phone1'] = "* Enter valid phone number e.g 0979100245.";
		}
		if (preg_match("/^[0-9]{9}/", $_POST['phone2']) === 0) {
			$errors['phone2'] = "* Enter valid phone number e.g 0979100245.";
		}

		if (preg_match("/^[0-9]{9}/", $_POST['phone3']) === 0) {
			$errors['phone3'] = "* Enter valid phone number e.g 0979100245.";
		}
		if (preg_match("/^[0-9]{9}/", $_POST['whatsapp']) === 0) {
			$errors['whatsapp'] = "* Enter valid phone number e.g 0979100245.";
		}

		if (count($errors) === 0) {
			$fname = $con->real_escape_string($_POST['fname']);
			$lname = $con->real_escape_string($_POST['lname']);
			$phone1 = $con->real_escape_string($_POST['phone1']);
			$phone2 = $con->real_escape_string($_POST['phone2']);
			$phone3 = $con->real_escape_string($_POST['phone3']);
			$email = $con->real_escape_string($_POST['email']);
			$whatsapp = $con->real_escape_string($_POST['whatsapp']);
			$id = $_POST['id'];

			/*code to update the new_record table with the edited */

			$sql = "
			update new_record 
			set 
			 fname = '$fname',
			 lname = '$lname',
			 phone1 = '$phone1',
			 phone2 = '$phone2',
			 phone3 = '$phone3',
			 email = '$email',
			 whatsapp = '$whatsapp'
			
			where id = '$id'
			";

			$con->query($sql);

			header("Location: table.php");
		}
	}
}

?>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="login/css/style.css">
	<script src="" type="text/javascript"></script>
	<script src="script.js"></script>
	<title></title>
</head>

<body>

	<div id='cssmenu'>
		<ul>
			<li class='active'><a href='index.php'><span>Add Contacts</span></a></li>
			<li><a href='table.php'><span>view contacts</span></a></li>
			<li><a href='search_form.php'><span>search</span></a></li>
			<li class='last'><a href='#'><span></span></a></li>
		</ul>
	</div>
	<?php
	$id = $_REQUEST['id'];
	?>

	<div id="container">

		<div class="form">
			<h1>ENTER DETAILS TO UPDATE CONTACT LIST </h1>
			<form method="post" action="update_form.php">

				<table>
					<tr>
						<td colspan="2"><?php if (isset($successful)) {
															echo $successful;
														} ?></td>
					</tr>
					<tr>
						<td>
							<input type="text" name="fname" id="fname" placeholder="First Name" value="<?php if (isset($errors['fname'])) {
																																														echo $_POST['fname'];
																																													} else {
																																														echo $fname;
																																													} ?>">
						</td>
						<td>
							<input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php if (isset($errors['lname'])) {
																																													echo $_POST['lname'];
																																												} else {
																																													echo $lname;
																																												}  ?>">
						</td>
					</tr>
					<tr>
						<td>
							<?php if (isset($errors['fname'])) {
								echo "<h2>" . $errors['fname'] . "</h2>";
							} ?>
						</td>
						<td>
							<?php if (isset($errors['lname'])) {
								echo "<h2>" . $errors['lname'] . "</h2>";
							} ?>
						</td>
					</tr>

					<tr">
						<td colspan="2"><input type="text" name="phone1" id="phone1" placeholder="Phone 1" value="<?php if (isset($errors['phone1'])) {
																																																				echo $_POST['phone1'];
																																																			} else {
																																																				echo $phone1;
																																																			} ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><?php if (isset($errors['phone1'])) {
																echo "<h2>" . $errors['phone1'] . "</h2>";
															} ?></td>
						</tr>
						<tr">
							<td colspan="2"><input type="text" name="phone2" id="phone1" placeholder="Phone 2" value="<?php if (isset($errors['phone2'])) {
																																																					echo $_POST['phone2'];
																																																				} else {
																																																					echo $phone2;
																																																				} ?>"></td>
							</tr>
							<tr>
								<td colspan="2"><?php if (isset($errors['phone2'])) {
																	echo "<h2>" . $errors['phone2'] . "</h2>";
																} ?></td>
							</tr>
							<tr">
								<td colspan="2"><input type="text" name="phone3" id="phone3" placeholder="Phone 3" value="<?php if (isset($errors['phone3'])) {
																																																						echo $_POST['phone3'];
																																																					} else {
																																																						echo $phone3;
																																																					} ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><?php if (isset($errors['phone3'])) {
																		echo "<h2>" . $errors['phone3'] . "</h2>";
																	} ?></td>

								</tr>
								<tr">
									<td colspan="2"><input type="text" name="email" id="email" placeholder="E-mail Address" value="<?php if (isset($errors['email'])) {
																																																										echo $_POST['email'];
																																																									} else {
																																																										echo $email;
																																																									}  ?>"></td>
									</tr>
									<tr>
										<td colspan="2"><?php if (isset($errors['email'])) {
																			echo "<h2>" . $errors['email'] . "</h2>";
																		} ?></td>
									</tr>
									<tr">
										<td colspan="2"><input type="text" name="whatsapp" id="whatsapp" placeholder="whatsapp" value="<?php if (isset($errors['whatsapp'])) {
																																																											echo $_POST['whatsapp'];
																																																										} else {
																																																											echo $whatsapp;
																																																										}  ?>"></td>
										</tr>
										<tr>
											<td colspan="2"><?php if (isset($errors['whatsapp'])) {
																				echo "<h2>" . $errors['whatsapp'] . "</h2>";
																			} ?></td>
										</tr>



										<tr>
											<input type="hidden" id="custId" name="id" value="<?php echo $_REQUEST['id']; ?>">
											<td><input type="submit" name="submit" id="submit" value="Submit"></td>
										</tr>
				</table>
			</form>
		</div>
		<div class="footer"></div>
	</div>

</body>

</html>