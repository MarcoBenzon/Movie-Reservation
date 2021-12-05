<?php 

$mysqli = new mysqli('localhost','root','','moviereservation');

if (isset($_POST['register']))
{
	$employeecode 		= $_POST['employeecode'];
	$username 			= $_POST['username'];
	$password 			= $_POST['password'];
	$firstname 			= $_POST['firstname'];
	$lastname 			= $_POST['lastname'];
	$email 				= $_POST['email'];
	$pnumber 			= $_POST['pnumber'];

	$mysqli->query("INSERT INTO employee (employeecode,username,password,firstname,lastname,email,pnumber) VALUES('$employeecode','$username','$password','$firstname','$lastname','$email','$pnumber')") or die($mysqli->error);

		

}


?>