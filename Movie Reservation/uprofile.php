<?php 

session_start();
if (!isset($_SESSION['username']))
{
   echo "<script>alert('Login First!'); location.href='ulogin.php';</script>";
}
$conn=mysqli_connect("localhost","root","","moviereservation")or die(mysql_error());

if (isset($_POST['update']))
{
	$id=$_POST['id'];
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$newpass		= password_hash($password, PASSWORD_DEFAULT);
	$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pnumber = mysqli_real_escape_string($conn,$_POST['pnumber']);
	$sessions = $_SESSION['username'];

	$sql = "UPDATE customer SET  password = '$newpass', firstname = '$firstname', lastname = '$lastname', email = '$email', pnumber = '$pnumber' WHERE username = '$sessions'";
	$result= mysqli_query($conn,$sql);

	if ($result)
	{
		$message ="Update Success... Please Relogin To Apply Changes";
		echo "<script>
			alert('$message');
			window.location.href='ulogin.php';
			</script>";
	}
	else
	{
		echo "Error Updating The Record".mysql_error($conn);
	}

}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="javascript" href="bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
</head>
<style type="text/css">
.jumbotron{
margin-top: 20px;
margin-bottom: 10px;
border-radius: 20px;
}
.form-control1{
	width: 50%;
}
.new{
	text-align: center;
}
</style>
<body>


	
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
				</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="uhome.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="umovieo.php" class="nav-link">Ongoing</a>
				</li>
				<li class="nav-item">
					<a href="umovieu.php" class="nav-link">Upcoming</a>
				</li>
				<li class="nav-item active">
					<a href="uprofile.php" class="nav-link">Profile</a>
				</li>
				<li class="nav-item">
					<a href="ulogout.php" class="nav-link">Log Out</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8 jumbotron">
			<center><h3>Edit Your Profile</h3></center>
		</div>
		<div class="col-sm-2">
			
		</div>
	</div>
</div>
<?php
$connection=mysqli_connect("localhost","root","","moviereservation");
$sessions = $_SESSION['username'];

$query="SELECT * FROM customer WHERE username = '$sessions'";

$query_run=mysqli_query($connection ,$query);

?>
<?php  
if ($query_run)
{
	while ($row = mysqli_fetch_assoc($query_run))
	{
	
?>

<div class="container">
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8 jumbotron">
			<form action="uprofile.php" method="POST">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
				</div>
				<div class="form-group">
					<label><b>FirstName</b></label>
					<input type="text" name="firstname" class="form-control" value="<?php echo $row['firstname'] ?>" readonly>
				</div>
				<div class="form-group">
					<label><b>LastName</b></label>
					<input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname'] ?>" readonly>
				</div>
				<div class="form-group">
					<label><b>UserName</b></label>
					<input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" readonly>
				</div>
				<div class="form-group">
					<label><b>Password</b></label>
					<input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>">
				</div>
				<div class="form-group">
					<label><b>Email</b></label>
					<input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>">
				</div>
				<div class="form-group">
					<label><b>Phone Number</b></label>
					<input type="number" name="pnumber" class="form-control" value="<?php echo $row['pnumber'] ?>">
				</div>
				<div class="form-group new" >
					<input type="submit" name="update" class="btn btn-primary form-control1" value="Update">
				</div>
			</form>
		</div>
		<div class="col-sm-2">
			
		</div>
	</div>
</div>

<?php
}
}
else
{
	echo "No Records Found!";
}
?>


<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Connect With Us</h2>
		</div>
		<div class="col-12 social padding">
			<a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
			<a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
			<a href="https://www.google.com/"><i class="fab fa-google-plus"></i></a>
			<a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
			<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
			<a href="https://www.discord.com/"><i class="fab fa-discord"></i></a>
		</div>
	</div>
</div>

<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<hr class="light">
				<h5>Contacts</h5>
				<hr class="light">
				<p>0912-345-6789</p>
				<p>abcdefhijk@gmail.com</p>
				<p>Street Fighter</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Our Hours</h5>
				<hr class="light">
				<p>Monday to Friday: 10am - 10pm</p>
				<p>Saturday: 10am - 8pm</p>
				<p>Sunday: Closed</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Service Area</h5>
				<hr class="light">
				<p>Dagupan City,Arellano,0000</p>
				<p>Dagupan City,Arellano,0000</p>
				<p>Dagupan City,Arellano,0000</p>
			</div>
			<div class="col-12">
				<hr class="light-100">
				<h5>&copy;WeFailedAsDinosaurs.com</h5>
			</div>
		</div>
	</div>
</footer>
</body>
</html>