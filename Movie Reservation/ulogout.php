<?php
session_start();

if (isset($_SESSION['username'])) {
	$session_user = $_SESSION['username'];
}
else{
	header('Location:ulogin.php');
}
session_destroy();
header('Location:ulogin.php');
?>