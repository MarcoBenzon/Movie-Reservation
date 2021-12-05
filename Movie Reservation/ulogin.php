<?php require_once('ureg.php'); ?>

<?php
include "ufunction.php";

if(isset($_POST['login']))
{
	$username =mysqli_real_escape_string($con,$_POST['username']);
	$password =mysqli_real_escape_string($con,$_POST['password']);

	if (empty($username) || empty($password))
	{
		header("location:ulogin.php?Empty = Please Fill!!!");
	}
	else
	{
		$username =mysqli_real_escape_string($con,$_POST['username']);
		$password =mysqli_real_escape_string($con,$_POST['password']);
		$query="SELECT * FROM customer WHERE username='$username'";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)>0) 
		{
			while ($row=mysqli_fetch_array($result))
			{
				if (password_verify($password, $row["password"]))
				{
					$_SESSION['username'] = $username;
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['password'] = $password;
					$_SESSION['email'] = $email;
					$_SESSION['pnumber'] = $pnumber;
					header("location:uprofile.php");
				}
				else
				{
					echo '<script>alert("Wrong Username and Password")</script>';
				}
			}
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
	opacity: 0.7;
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
input[type="submit"]{
	border-radius: 10px;
}
</style>
<body>
	
<form action="ulogin.php" method="post">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-6 jumbotron">
				<h1>Account LogIn</h1>
				<p>Please Input The Following</p>
				<hr class="mb-3">
				<label for="username"><b>UserName</b></label>
				<input class="form-control" type="text" name="username" required>
				<label for="password"><b>Password</b></label>
				<input class="form-control" type="password" name="password" required>
				<hr class="mb-3">
				<input type="submit" name="login" value="Log In" class="btn btn-primary">
				<a href="uregister.php">Create An Account</a>
			</div>
			<div class="col-sm-3">
				
			</div>
		</div>
	</div>
</form>



</body>
</html>
