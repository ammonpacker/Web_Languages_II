<?php
	$first_name = $_POST['firstName'];
	$last_name = $_POST['lastName'];
	$name = $_POST['firstName'].' '.$_POST['lastName'];
	$email = $_POST['email'];
	 
	
	//building database connection      	
	$dbConnection = mysqli_connect('localhost','ammonp93_dgmusr','C345&G*%','ammonp93_dgm3760') or die('Connection to the Database failed.');           
	
	//build query
	$query = "INSERT INTO Newsletter (first, last, email)" 	 
	  ."VALUES('$first_name','$last_name','$email')";
	
	//talk to database
	$result = mysqli_query($dbConnection, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbConnection));
	
	//close connection
	mysqli_close($dbConnection);
	echo 'Thanks for signing up!.<br/>';               
?>
