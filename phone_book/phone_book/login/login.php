<?php
session_start();
echo 'after ss';
if (isset($_POST['login_email'])) {
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];

	$con = new mysqli('localhost', 'root', '', 'phone_book');
	if ($con->connect_error) {
		echo "couldn't connect";
		die();
	}

	$email = $con->real_escape_string($email);
	$sql = "SELECT password, salt FROM members WHERE email = '$email';";
	$result = $con->query($sql);

	if ($result->num_rows < 1) {
		$message = "Login Failed!";
		header("location: index.php?message=" . $message);
	}
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$hash = hash('sha256', $row['salt'] . hash('sha256', $password));


	if ($hash != $row['password']) {
		$message = "Login Failed!";
		header("location: index.php?message=" . $message);
	} else {
		session_regenerate_id();
		$_SESSION['email'] = $email;
		header("location: ../index.php");
	}
}
