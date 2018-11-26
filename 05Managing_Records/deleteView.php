<?php
  	//building database connection      	
	$dbc = mysqli_connect('localhost','ammonp93_dgmusr','CA}x]ee1&G*%','ammonp93_dgm3760') or die('Connection to the Database failed.');           
	
	//build query
	$query = "SELECT * FROM employee ORDER BY last ASC";
	
	//talk to database
	$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
				

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
	<title>Web Lang II Project 5</title>

	<div class="container">
		<div class="card bg-warning">
			<div class="card-body">
				<h2 class="card-title">Employees</h2>
				<?php
				
				  while($row = mysqli_fetch_array($result)){
				  	echo '<p>';
				  	echo $row['last'].', '.$row['first'].' - '.$row['dept'];
				  	echo '<a href="delete.php?id='.$row['id'].'"> Delete</a>';
				  	echo '</p>';				 
				  }
			
				mysqli_close($dbc);
				?>
				<?php require_once('footer.php');?>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>




</body>

</html>
