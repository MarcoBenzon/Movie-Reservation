
<?php
session_start();
if (!isset($_SESSION['username']))
{
   echo "<script>alert('Login First!'); location.href='alogin.php';</script>";
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
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
</head>
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
					<a href="ahome.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="amovieo.php" class="nav-link">Ongoing</a>
				</li> 
				<li class="nav-item">
					<a href="amovieu.php" class="nav-link">Upcoming</a>
				</li>
				<li class="nav-item">
					<a href="aemployee.php" class="nav-link">Employees</a>
				</li>
				<li class="nav-item">
					<a href="acustomer.php" class="nav-link">Customers</a>
				</li>
				<li class="nav-item active">
					<a href="areservation.php" class="nav-link">Reservations</a>
				</li>
				<li class="nav-item">
					<a href="alogout.php" class="nav-link">Log Out</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">List of Reservations</h1>
		</div>
		<hr>
	</div>
</div>
<div class="container">
	<div class="col-12">
		<h3>People Who Reserves Their Tickets</h3>
	</div>
</div>

<?php 
	$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));

	$result = $mysqli->query("SELECT * FROM reservation") or die($mysqli->error);

	//pre_r($result);
?>

<div class="container">
	<?php
		$connection = mysqli_connect("localhost", "root", "", "moviereservation");
		if(isset($_POST['Search']))
		{
		   $valuetoSearch = $_POST['valuetoSearch'];
		   $query = "SELECT * FROM `reservation` WHERE CONCAT (`firstname` ,`lastname`,`time`, `quantity`, `title`, `duration`,'price','valid') LIKE'%".$valuetoSearch."%'";
		    $search_result = filterTable($query);
		    
		}
		 else {
		    $view_query = mysqli_query($connection,"SELECT * FROM reservation");
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
	<form action="areservation.php" method="post">
		<div class="row">
			<div class="col-sm-6">
				<input type="text" name="valuetoSearch" class="form-control" placeholder="Search">
			</div>
			<div class="col-sm-6">
				<input type="submit" name="Search" value="Search" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>



<div class="container jumbotron">
	<div class="row">
		<div class="col">
	    	<table class="table">
				<thead>
					<tr>
						<th>FirstName</th>
						<th>LastName</th>
						<th>Time Options</th>
						<th>Quantity</th>
						<th>Title</th>
						<th>Duration</th>
						<th>Price</th>
						<th>Valid</th>
					</tr>
				</thead>
			<?php

    if($search_result)
    {
      while($row = mysqli_fetch_assoc($search_result))
      {
        ?>
					<tr>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['time']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['duration']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['valid']; ?></td>
					</tr>
			<?php
      }
      
    }
    
    else{
      echo "No Records Found";
    }
    ?>
			</table>
	    </div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>

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