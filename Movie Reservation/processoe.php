<?php


$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
		$image=$_FILES['image']['name'];
		$title = $_POST['title'];
		$duration = $_POST['duration'];
		$genre = $_POST['genre'];
		$price = $_POST['price'];
		$director = $_POST['director'];
		$valid = $_POST['valid'];
		$target ="poster/".basename($_FILES['image']['name']);

		$mysqli->query("INSERT INTO omovie (file,title,duration,genre,price,director,valid) VALUES('$image','$title','$duration','$genre','$price','$director','$valid')") or die($mysqli->error);

		/*$_SESSION['message'] = "Saved";
		$_SESSION['msg_type'] = "success";*/
		if (move_uploaded_file($_FILES['']['name'], $target)) {
			echo "hello";
		}


		header("location: emovieo.php");

	}

if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM omovie WHERE id=$id") or die($mysqli->error());

		/*$_SESSION['message'] = "Record Has Been Deleted";
		$_SESSION['msg_type'] = "danger";*/

		/*header("location: amovieo.php");*/

	}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update= true;
	$result = $mysqli->query("SELECT * FROM omovie WHERE id=$id") or die($mysqli->error());
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
	$image=$_FILES['image']['name'];
	$title=$_POST['title'];
	$duration=$_POST['duration'];
	$genre = $_POST['genre'];
	$price = $_POST['price'];
	$director = $_POST['director'];
	$valid = $_POST['valid'];

	$mysqli->query("UPDATE omovie SET file='$image', title='$title',duration='$duration',genre='$genre',price='$price',director='$director',valid='$valid' WHERE id=$id") or die($mysqli->error);
	
	header("location: emovieo.php");
}

?>