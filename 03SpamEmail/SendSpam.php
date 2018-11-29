<?php
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$from =  "ammon.packer@gmail.com";
	
	//building database connection      	
	$dbc = mysqli_connect('localhost','ammonp93_dgmusr','CA}x]4323&G*%','ammonp93_dgm3760') or die('Connection to the Database failed.');           
	
	//build query
	$query = "SELECT * FROM Newsletter";
	
	//talk to database
	$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbConnection));
	
	
	//display what we found
	while ($row= mysqli_fetch_array($result)){
		$firstName = $row['first'];
		$lastName =  $row['last'];
		$to =  $row['email'];
		$msg = "Dear $firstName $lastName,$message";
		
		mail($to, $subject, $msg, 'From: '.$from);
		
		echo 'Message sent to: ' .  $to . '</br>';
		
	}
	
	
	//close connection
	mysqli_close($dbc);
	              
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>
<title>Web Lang II Project 1</title>

<div class="container">

</div>

          </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  



</body>

</html>
