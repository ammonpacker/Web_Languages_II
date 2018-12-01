<?php
			
			require_once('variable.php');

			//building database connection      	
			$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
			if(isset($_POST['submit'])){
			$first = mysqli_real_escape_string($dbc, trim($_POST['first']));
			$last = mysqli_real_escape_string($dbc, trim($_POST['last']));
			$user = mysqli_real_escape_string($dbc, trim($_POST['user'])); 
			$password = mysqli_real_escape_string($dbc, trim($_POST['password'])); 
			$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
			//check if input is empty or not
			if(!empty($user) && !empty($password) && !empty($password1) &&($password == $password1)){
		
				$query= "SELECT * FROM users WHERE user = '$user'";
				$exists = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
		
				if(mysqli_num_rows($exists) == 0){
				$query= "INSERT INTO users (first, last, user, password, date) VALUES ('$first', '$last', '$user', SHA('$password'), NOW() )";
		
				mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
		
				//confirmation message
				$feedback= '<div class="jumbotron jumbotron-fluid text-center">'.'<h3>Thank you! Your new account has been created.</h3>'.'<p> Return to the <a href="index.php">Main Page</a></p>'.'</div>';        	

    				//bake some cookies
    				setcookie('user', $user, time() + (60*60*24*30)); //expires in 30 days
    				setcookie('first', $first, time() + (60*60*24*30)); //expires in 30 days
    				setcookie('last', $last, time() + (60*60*24*30)); //expires in 30 days
		
				//close connection
				mysqli_close($dbc);
		
				//leave form page
				//exit();
				}else{
				  $feedback= '<h4 class="text-danger">'.'An account exists for this username already.'.'</h4>'.'<h4 class="text-danger">'.'Please choose a different one.'.'</h4>';				  
				}	
		
				}// end of empty if	
			}; //end of isset



		?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Profile3/profile3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Cookies</title>
</head>

<body>

<?php include_once('header.php'); ?>
<div id="content" class="container">
     <div class="card bg-light border-dark">
	<div class="card-body">
		
		<?php echo $feedback ?>
		  <h4 class="card-title">Sign Up</h4>
			<form id="myForm" action="" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					<label for="first">First Name:</label>
					<input type="text" class="form-control" width="50%" name="first" value="<?php if(!empty($first))echo $first; ?>" required><br/>
					
					<label for="last">Last Name:</label>
					<input type="text" class="form-control" width="50%" name="last" value="<?php if(!empty($last)) echo $last; ?>" required><br/>
					
					<label for="user">User Name:</label>
					<input type="text" class="form-control" width="50%" name="user" value="<?php if(!empty($user)) echo $user; ?>" required><br/>
					
					<label for="password">Password:</label>
					<input type="password" class="form-control" width="50%" name="password" required><br/>
					
					<label for="password1">Confirm Password:</label>
					<input type="password" class="form-control" width="50%" name="password1" required><br/>
				  
					<br><button type="submit" name="submit" class="btn btn-dark btn-lg">Sign Up</button>
					<a href="index.php" class="btn btn-dark btn-lg" role="button">Cancel</a>
				</div>
			</form>
	</div>

</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



</html>
