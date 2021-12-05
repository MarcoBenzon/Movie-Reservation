<?php
require_once('areg.php');
?>

<?php
include "afunction.php";
session_start();
if(isset($_POST['login']))
{
	$username =$_POST['username'];
	$password =$_POST['password'];

	if (empty($username) || empty($password))
	{
		echo '<script type="text/javascript">alert("Please Fill Up Before Logging In");</script>';
	}
	else
	{
		$query="SELECT * FROM admin WHERE username='".$username."' and password='".$password."'";
		$result = mysqli_query($con,$query);
		if(mysqli_fetch_assoc($result))
		{
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			header("location:ahome.php");
		}
		else
		{
			echo '<script type="text/javascript">alert("Incorrect UserName and Password");</script>';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="javascript" href="bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<style type="text/css">
.form-control{
	opacity: 0.8;
	color: black;
	border-radius: 20px;
}
input[type="text"]::placeholder{
	color: black;
}
body{
	background:url('bgimages/hobs.jpg');
   	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;
	background-size: cover;
	font-family: "Trebuchet MS", Helvetica, sans-serif
}
.jumbotron{
	background-color: #263f44;
	border-radius: 25px;
	background: rgba(0,0,0,0.7);
	margin-top: 150px;
}
h1,h3,label,p{
	color: white;
}
table{
	color: white;
}
#book{
	float: right;
}
</style>
<body>
	
<form action="" method="post">
	<div class="container">
		<div class="row">
		<div class="col-sm-3">
			
		</div>
			<div class="col-sm-6 jumbotron">
				<h1>Administrator LogIn</h1>
				<p>Please Input The Following</p>
				<hr class="mb-12">
				<label for="username">UserName</label>
				<input class="form-control" type="text" name="username" required>
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" required>
				<hr class="mb-12">
				<input type="submit" name="login" value="Log In" class="btn btn-primary">
			</div>
			<div class="col-sm-3">
				
			</div>
		</div>
	</div>
</form>

</body>
</html>
