<?php
session_start();
if (!isset($_SESSION['username']))
{
   echo "<script>alert('Login First!'); location.href='ulogin.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>We Failed As Dinosaurs</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="javascript" href="bootstrap/js/bootstrap.min.js">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
				</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a href="uhome.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="umovieo.php" class="nav-link">Ongoing</a>
				</li> 
				<li class="nav-item">
					<a href="umovieu.php" class="nav-link">Upcoming</a>
				</li>
				<li class="nav-item">
					<a href="uprofile.php" class="nav-link">Profile</a>
				</li>
				<li class="nav-item">
					<a href="ulogout.php" class="nav-link">Log Out</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
	</ul>
<div class="carousel-inner">
	<div class="carousel-item active">
		<img src="bgimages/pAFte5.jpg">
		<div class="carousel-caption">
			<h1 class="display-2">Online Movie Ticket Reservation System</h1>
		</div>
	</div>
</div>
</div>

<!--- Jumbotron -->


<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">About Our System</h1>
		</div>
	</div>
</div>

<!--- Four Column Section -->


<div class="container padding jumbotron">
	<div class="row padding">
		<div class="col-md-12 col-lg-12" align="center">
			<h5>
				asmdabsdjkhaskdqwoyehbm
			</h5>
			<br>
		</div>
	</div>
</div>

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