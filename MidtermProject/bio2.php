<?php
	$bio = $_POST['bio'];
	$id = $_POST['id'];
	
	require_once('variable.php');
	//building database connection      	
	$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
	//build query
	$query = "UPDATE research SET bio='$bio' WHERE id='$id'";
	
	//talk to database
	$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
	

	//close connection
	mysqli_close($dbc);
	
	header('Location: manage.php');
	              
?>
