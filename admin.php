<?php
	error_reporting(0);
	include('all_products.php');
	$title = "Admin Panel"; 
	include ('header.php') ;


	$pass = $_POST['pass'];

	if ($_SESSION['username']=="admin")
	{
	        include("manageRequest.php");
	}
	else
	{

	    header('location: index.php');
	}
?>

<?php include ('footer.php') ?>