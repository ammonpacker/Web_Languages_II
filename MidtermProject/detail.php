<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>
	<title>Midterm Project</title>
<?php require_once('header.php');?>
	<div class="">
		
			
				<?php
				
				$emp_id = $_GET[id];
				require_once('variable.php');
  				//building database connection      	
				$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
				//build query
				$query = "SELECT * FROM research WHERE id=$emp_id";
	
				//talk to database
				$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
	
				$found = mysqli_fetch_array($result);
				
				
				$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
				$filename = $first.$last.time().'.'.$ext;
				$path = 'employees/';
				
				echo '<div class="card justify-content-center" style="width:400px">';
				echo '<h2>'.'Employee Details'.'</h2>';
     				echo '<div class="card-body">';
     				echo '<h3 class="card-title">'.$found['first'].', '.$found['last'].'</h3>';     	
     				echo '<p class="card-text">';
				echo '<b>'.'Phone: '.'</b>'.$found['phone'].'<br>'.'<b>'.'Email: '.'</b>'.$found['email'].'<br>';
				echo '<b>'.'Expertise: '.'</b>'.$found['expertise'].'<br>'.'<b>'.'Specialization: '.'</b>'.$found['special'].'<br>';
				echo '<b>'.'Bio: '.'</b>'.$found['bio'];
				echo '</p>';
     				echo '<img class="card-img-bottom" src="'.$path.$found['image'].'" alt="photo"/>'.'<br>';
     				echo '</div>';
     				echo '</div>';
				?>
			<br>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>




</body>

</html>


<?php


?>
