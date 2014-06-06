<?php 
	session_start();
	$user = $_SESSION['user'];
	include('config.php');
	session_destroy();
	header("location:login.php");
?>