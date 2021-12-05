<?php
require_once('ureg.php');
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

		body{
			
			background:url('bgimages/spidey.jpg');
    		background-repeat: no-repeat;
			background-position: center center;
			background-attachment: fixed;
			background-size: cover;
			font-family: "Trebuchet MS", Helvetica, sans-serif
		}
		h1,p{
			color: white;
		}
		.jumbotron{
			border-radius: 10px;
			background: rgba(0,0,0,0.7);
			margin-top: 3px;
		}


		label{
			color: white;
		}

    </style>
<body>
<div>
	<form action="ulogin.php" method="post">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 jumbotron">
					<h1>Account Registration</h1>
					<p>Please Fill Up The Form With Correct Values!!</p>
					<hr class="mb-3">
					<label for="username">UserName</label>
					<input class="form-control" type="text" name="username" required>
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" required>
					<label for="firstname">FirstName</label>
					<input class="form-control" type="text" name="firstname" required>
					<label for="lastname">LastName</label>
					<input class="form-control" type="text" name="lastname" required>
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email" required>
					<label for="phonenumber">Phone Number</label>
					<input class="form-control" type="number" name="pnumber" required>
					<hr class="mb-3">
					<input type="submit" name="register" value="Register" class="btn btn-primary">
					<a href="ulogin.php">Back To Login</a>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</form>
</div>
</body>
</html>