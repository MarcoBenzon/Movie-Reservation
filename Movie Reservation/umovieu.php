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
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
	<link rel="stylesheet" type="javascript" href="bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
</head>
<body>
<!-- Navigation -->
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
				<li class="nav-item active" >
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

<div class="container-fluid">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">Upcoming Movies This 2020!!!</h1>
		</div>
		<hr>
		<div class="col-12">
			<h3>This Are The Movies That Will to our Cinema</h3>
		</div>
	</div>
</div>
<div class="container">
	<?php
		$connection = mysqli_connect("localhost", "root", "", "moviereservation");
		if(isset($_POST['Search']))
		{
		   $valuetoSearch = $_POST['valuetoSearch'];
		   $query = "SELECT * FROM `umovie` WHERE CONCAT (`title`) LIKE'%".$valuetoSearch."%'";
		    $search_result = filterTable($query);
		    
		}
		 else {
		    $view_query = mysqli_query($connection,"SELECT * FROM umovie");
		    $search_result = $view_query;
		}

		// function to connect and execute the query
		function filterTable($query)
		{
		    $connection = mysqli_connect("localhost", "root", "", "moviereservation");
		    $filter_result = mysqli_query($connection, $query);
		    return $filter_result;
		}

	?>
	<form action="umovieu.php" method="post">
		<div class="row">
			<div class="col-sm-9">
				<input type="text" name="valuetoSearch" class="form-control" placeholder="Search (TITLE)">
			</div>
			<div class="col-sm-1">
				<input type="submit" name="Search" value="Search" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>

<?php 
	$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));

	$result = $mysqli->query("SELECT * FROM umovie") or die($mysqli->error);

	//pre_r($result);
?>
<?php 
if($search_result)
    {
      while($row = mysqli_fetch_assoc($search_result))
      {
        ?>
<div class="container jumbotron">
	<div class="row">
		<div class="col-sm-12">
	    	<table class="table">
					<tr class="col-sm-3">
						<td rowspan="4"><?php echo "<img src='poster/".$row['file']."'>" ?></td>
						<td colspan="2">
						<label><b>Title:</b></label><br>
						<?php echo $row['title']; ?></td>
						<td colspan="2">
						<label><b>Duration:</b></label><br>
						<?php echo $row['duration']; ?></td>
					</tr>
					<tr>
						<td colspan="2">
						<label><b>Genre:</b></label><br>
						<?php echo $row['genre']; ?></td>
						<td colspan="2">
						<label><b>Price:</b></label><br>
						<?php echo $row['price']; ?></td>
					</tr>
					<tr>
						<td colspan="2">
						<label><b>Director:</b></label><br>
						<?php echo $row['director']; ?></td>
						<td colspan="2">
						<label><b>Valid Until:</b></label><br>
						<?php echo $row['valid']; ?></td>
					</tr>	
			</table>
	    </div>
	</div>
</div>
<?php
      }
      
    }
    else{
      echo "No Records Found";
    }
    ?>
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Connect</h2>
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