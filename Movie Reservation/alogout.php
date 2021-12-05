<?php
session_start();

if (isset($_SESSION['username'])) {
	$session_user = $_SESSION['username'];
}
else{
	header('Location:alogin.php');
}
session_destroy();
header('Location:alogin.php');
?>