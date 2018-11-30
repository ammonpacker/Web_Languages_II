<?php
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$from =  $_POST['from'];
	
	$id = $_POST['id'];
	require_once('variable.php');
	//building database connection      	
	$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
	//build query
	$query = "Select * FROM blog WHERE id=$id";
	
	//talk to database
	$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
	
	
	//display what we found
	while ($row= mysqli_fetch_array($result)){
		
		$to =  $row['email'];
		$msg = 'Dear '.$firstName.' '.$lastName.','.'<br>'.$message;
		
		mail($to, $subject, $msg, 'From: '.$from);	
	}
	
	header('Location: msgSent.php');
	//close connection
	mysqli_close($dbc);
	              
?>
