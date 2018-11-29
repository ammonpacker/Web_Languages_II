<?php
	$first_name = $_POST['firstName'];
	$last_name = $_POST['lastName'];
	$name = $_POST['firstName'].' '.$_POST['lastName'];
	$when_it_happened = $_POST['whenithappened'];
	$seen_dog = $_POST['seendog'];
	$comments = $_POST['comments'];
	$email = $_POST['email'];
	 
	
	//building database connection      	
	$dbConnection = mysqli_connect('localhost','ammonp93_dgmusr','sfrewdd123&G*%','ammonp93_dgm3760') or die('Connection to the Database failed.');           
	
	//build query
	$query = "INSERT INTO alien_abduction (first, last, when_it_happened, seen_dog, email, comments)" 	 
	  ."VALUES('$first_name','$last_name','$when_it_happened','$seen_dog','$email','$comments')";
	
	//talk to database
	$result = mysqli_query($dbConnection, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbConnection));
	echo 'Thanks for submitting the form.<br/>';
	echo 'You were abducted on ' . $when_it_happened . '<br/>';
	if(isset($_POST['seendog'])){
	  echo "Was Fang there? ".$_POST['seendog'] . '<br/>';  //  Displaying Selected Value
	}
	echo 'Your email address is ' . $email;                
?>
