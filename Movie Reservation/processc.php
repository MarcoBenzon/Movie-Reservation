<?php

session_start();

$id=0;
$title='';
$duration='';
$update=false;

$mysqli = new mysqli('localhost','root','','moviereservation') or die(mysqli_error($mysqli));
/*
if (isset($_POST['save'])){
		$title = $_POST['title'];
		$duration = $_POST['duration'];
		$genre = $_POST['genre'];
		$price = $_POST['price'];
		$director = $_POST['director'];
		$valid = $_POST['valid'];

		$mysqli->query("INSERT INTO omovie (title,duration,genre,price,director,valid) VALUES('$title','$duration','$genre','$price','$director','$valid')") or die($mysqli->error);

		/*$_SESSION['message'] = "Saved";
		$_SESSION['msg_type'] = "success";

		header("location: aemployee.php");

	}
*/
if (isset($_GET['delete'])){
		$id = $_GET['delete'];
		$mysqli->query("DELETE FROM customer WHERE id=$id") or die($mysqli->error());

		/*$_SESSION['message'] = "Record Has Been Deleted";
		$_SESSION['msg_type'] = "danger";*/

		header("location: acustomer.php");

	}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update= true;
	$result = $mysqli->query("SELECT * FROM customer WHERE id=$id") or die($mysqli->error());

	if (is_array($result)>0) {
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

	$mysqli->query("UPDATE employee SET title='$title',duration='$duration',genre='$genre',price='$price',director='$director',valid='$valid' WHERE id=$id") or die($mysqli->error);
}
if(isset($_POST['search']))
{
	$search=$_POST['search'];
	if($search=='')
	{
	echo "<script>";
	echo "<alert>Search Invalid!</alert";
	echo "</script>";
	}
	else
	{
		$mysqli->query("SELECT * FROM employee WHERE id like '%search%'
		or firstname like '%$search%'
		or lastname like '%$search%'
		or email like '%$search%'
		or pnumber like '%$search%'") or die($mysqli->error);
		$count=is_array($mysqli);
	}

	if($count==0)
	{
	echo "There are no search results.";
	}
	else
	{
		while($row=mysqli_fetch_array($mysqli))
		{
		$firstname=$row['FirstName'];
		$lastname=$row['LastName'];
		$email=$row['email'];
		$pnumber=$row['pnumber'];
		$output.='<br /><div>LRN: '.$firstname.
		'<br />Name: '.$lastname.', '.$email.' '.$pnumber.
		'<div><br />';
		}
	}
}

?>