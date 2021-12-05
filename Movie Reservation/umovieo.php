<?php
session_start();
$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));

if(isset($_POST['reserve']))
{
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$time = $_POST['time'];
	$quantity = $_POST['quantity'];
	$title = $_POST['title'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$valid = $_POST['valid'];

	$mysqli->query("INSERT INTO reservation (firstname,lastname,time,quantity,title,duration,price,valid) VALUES('$firstname','$lastname','$time','$quantity','$title','$duration','$price','$valid')") or die($mysqli->error);
}

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
	<title></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="javascript" href="bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
.jumbotron{
	border-radius: 20px;
}
</style>
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
				<li class="nav-item active">
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

<div class="container-fluid">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">Ongoing Movies This 2020!!!</h1>
		</div>
		<hr>
		<div class="col-12">
			<h3>This Are The Movies That Are Currently On Air in our Cinema</h3>
		</div>
	</div>
</div>
<div class="container">
	<?php
		$connection = mysqli_connect("localhost", "root", "", "moviereservation");
		if(isset($_POST['Search']))
		{
		   $valuetoSearch = $_POST['valuetoSearch'];
		   $query = "SELECT * FROM `omovie` WHERE CONCAT (`title`) LIKE'%".$valuetoSearch."%'";
		    $search_result = filterTable($query);
		    
		}
		 else {
		    $view_query = mysqli_query($connection,"SELECT * FROM omovie");
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
	<form action="umovieo.php" method="post">
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

	$result = $mysqli->query("SELECT * FROM omovie") or die($mysqli->error);

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
				<td rowspan="4">
				<?php echo "<img src='poster/".$row['file']."'>" ?></td>
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
			<tr>
				<td colspan="4">
					<button type="button" class="btn btn-success" data-toggle="modal"  data-target="#edi<?php echo $row['id'];?>">Reserve Movie</button>
				<td>
			</tr>
			</table>
	    </div>
	</div>
</div>

<div class="modal fade" role="dialog" id="edi<?php echo $row['id'];?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<h3 class="modal-title">Reservation Form</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" name="supplier_form" enctype="multipart/form-data">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						</div>
						<h2 align="center">Personal Information</h2>
						<div class="form-group">
							<input type="text" name="firstname" class="form-control" placeholder="FirstName">
						</div>
						<div class="form-group">
							<input type="text" name="lastname" class="form-control" placeholder="LastName">
						</div>
						<div class="form-group">
							<select name="time" class="form-control">
							<option selected="true" disabled>Time Options</option>
							<option>11:00 AM - 2:00 PM</option>
							<option>3:00 PM - 6:00 PM</option>
							<option>7:00 PM - 10:00 PM</option>
							</select>
						</div>
						<div class="form-group">
							<input type="number" name="quantity"  class="form-control" placeholder="Quantity">
						</div>
						<h3 align="center">Movie Information</h3>
						<div class="form-group">
							<input type="text" name="title" class="form-control" value="<?php echo $row['title'];?>" readonly>
						</div>
						<div class="form-group">
							<input type="text" name="duration" class="form-control" value="<?php echo $row['duration'];?>" readonly>
						</div>
						<div class="form-group">
							<input type="text" name="price" class="form-control" value="<?php echo $row['price'];?>" readonly>
						</div>
						<div class="form-group">
							<input type="date" name="valid" class="form-control" value="<?php echo $row['valid'];?>" readonly>
						</div>
						<div class="form-group">
							<input type="submit" name="reserve" value="Reserve Now" class="btn btn-primary form-control" onclick="myFunction()">
						</div>

					</form>
				</div>
				<!--MODAL BODY-->
				<!--MODAL FOOTER-->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
				<!--MODAL FOOTER-->
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="sweetalert/jquery-3.4.1.min.js"></script>
<script src="sweetalert/sweetalert2.all.min.js"></script>
<script>
function confirmation(){
    var result = confirm("");
    if(result){
        // Delete logic goes here
    }
}

function myFunction(){
	window.print();
}
</script>
</body>
</html>