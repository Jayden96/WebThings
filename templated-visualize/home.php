<!DOCTYPE HTML>
<html>
	<head>
		<title>Library System</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

	</head>
	<?php
	session_start(); 
	if($_SESSION['user']){}
	else{
		header("location:index.php");
	}
	$user = $_SESSION['user'];
	?>

	<body>
        <h2>Home Page</h2>
		<h1><p>Hi <?php Print "$user"?>!</p></h1>
        <a href="logout.php">Log Out</a><br/><br/>
        