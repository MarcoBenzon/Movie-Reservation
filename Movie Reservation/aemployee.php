<?php
session_start();
if (!isset($_SESSION['username']))
{
   echo "<script>alert('Login First!'); location.href='alogin.php';</script>";
}
?>
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


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>We Failed As Dinosaurs</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>

	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>


<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
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
				<li class="nav-item active">
					<a href="aemployee.php" class="nav-link">Employees</a>
				</li>
				<li class="nav-item">
					<a href="acustomer.php" class="nav-link">Customers</a>
				</li>
				<li class="nav-item">
					<a href="areservation.php" class="nav-link">Reservations</a>
				</li>
				<li class="nav-item">
					<a href="alogout.php" class="nav-link">Log Out</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">Registered Employees</h1>
		</div>
		<hr>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-10">
				<h3>Registered Employees</h3>
		</div>
		<div class="col-sm-2">
			<div>
				<div class="modal fade" tabindex="-1" role="dialog" id="modal">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
        						<h5 class="modal-title" id="exampleModalLongTitle" >Add New Employee</h5>
       							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        						</button>
      						</div>
							<div class="modal-body">
								<h4 align="center" >Employee Information</h4>
								<form method="post">
									<label>Employee Code</label>
									<input class="form-control" type="text" name="employeecode" required>
									<label >UserName</label>
									<input class="form-control" type="text" name="username" required>
									<label >Password</label>
									<input class="form-control" type="password" name="password" required>
									<label >FirstName</label>
									<input class="form-control" type="text" name="firstname" required>
									<label >LastName</label>
									<input class="form-control" type="text" name="lastname" required>
									<label >Email</label>
									<input class="form-control" type="email" name="email" required>
									<label >Phone Number</label>
									<input class="form-control" type="number" name="pnumber" required>
									<br>
									<input type="submit" name="register" value="Register" class="btn btn-primary form-control">
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal" value="Close">Close</button>
							</div>
						</div>
						</div>
					</div>
					<div align="center">
					<button type="button" class="btn btn-primary" data-target="#modal" data-toggle="modal">Add Employee</button></div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<?php
		$connection = mysqli_connect("localhost", "root", "", "moviereservation");
		if(isset($_POST['Search']))
		{
		   $valuetoSearch = $_POST['valuetoSearch'];
		   $query = "SELECT * FROM `employee` WHERE CONCAT (`employeecode`, `username`,`firstname`, `lastname`, `email`, `pnumber`) LIKE'%".$valuetoSearch."%'";
		    $search_result = filterTable($query);
		    
		}
		 else {
		    $view_query = mysqli_query($connection,"SELECT * FROM employee");
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
	<form action="aemployee.php" method="post">
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
						<th>EmployeeCode</th>
						<th>UserName</th>
						<th>FisrtName</th>
						<th>LastName</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
			<?php

    if($search_result)
    {
      while($row = mysqli_fetch_assoc($search_result))
      {
        ?>
					<tr>
						<td><?= $row['employeecode']; ?></td>
						<td><?= $row['username']; ?></td>
						<td><?= $row['firstname']; ?></td>
						<td><?= $row['lastname']; ?></td>
						<td><?= $row['email']; ?></td>
						<td><?= $row['pnumber']; ?></td>
						<td>
						<a href="processe.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Employee?')">Delete</a>
						<td>
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
    var result = confirm("Are you sure to remove this Employee?");
    if(result){
        // Delete logic goes here
    }
}
</script>
</body>
</html>