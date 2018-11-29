<?php

require_once('authorize.php');
$id = $_GET['id'];

require_once('variable.php');

//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
//build query
$query = "DELETE FROM blog WHERE id=$id";
	
//talk to database
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
				
//return to approve page
header('Location: approve.php');
?>
