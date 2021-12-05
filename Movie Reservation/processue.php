<?php


$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
		$title = $_POST['title'];
		$duration = $_POST['duration'];
		$genre = $_POST['genre'];
		$price = $_POST['price'];
		$director = $_POST['director'];
		$valid = $_POST['valid'];
		$image=$_FILES['image']['name'];
		$target ="poster/".basename($_FILES['image']['name']);

		$mysqli->query("INSERT INTO umovie (file,title,duration,genre,price,director,valid) VALUES('$image','$title','$duration','$genre','$price','$director','$valid')") or die($mysqli->error);

		/*$_SESSION['message'] = "Saved";
		$_SESSION['msg_type'] = "success";*/

		header("location: emovieu.php");

	}

if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM umovie WHERE id=$id") or die($mysqli->error());

		/*$_SESSION['message'] = "Record Has Been Deleted";
		$_SESSION['msg_type'] = "danger";*/

		header("location: amovieu.php");

	}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update= true;
	$result = $mysqli->query("SELECT * FROM umovie WHERE id=$id") or die($mysqli->error());

	if (mysqli_num_rows($result)==1) {
		$row = $result->fetch_array();
		$title = $row['title'];
		$duration = $row['duration'];
		$genre = $row['genre'];
		$price = $row['price'];
		$director = $row['director'];
		$valid = $row['valid'];
	}
}

if (isset($_POST['update'])){
	$id =$_POST['id'];
	$title=$_POST['title'];
	$duration=$_POST['duration'];
	$genre = $_POST['genre'];
	$price = $_POST['price'];
	$director = $_POST['director'];
	$valid = $_POST['valid'];
	$image=$_FILES['image']['name'];

	$mysqli->query("UPDATE umovie SET file='$image', title='$title',duration='$duration',genre='$genre',price='$price',director='$director',valid='$valid' WHERE id=$id") or die($mysqli->error);
}

?>