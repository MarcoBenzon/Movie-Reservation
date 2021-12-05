<?php 

$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));

if (isset($_POST['register']))
{
	$username 		= $_POST['username'];
	$password 		= $_POST['password'];
	$newpass		= password_hash($password, PASSWORD_DEFAULT);
	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$pnumber 		= $_POST['pnumber'];

	$mysqli->query("INSERT INTO customer (username,password,firstname,lastname,email,pnumber,type) VALUES('$username','$newpass','$firstname','$lastname','$email','$pnumber','user')") or die($mysqli->error);

	echo '<script language="javascript">';
	echo 'alert("Registration Success!!")';
	echo '</script>';
		

}


?>