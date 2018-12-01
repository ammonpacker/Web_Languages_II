<?php
require_once('variable.php');
				
$feedback = '<p><a href="signup.php">Create an account</a></p>';

if(isset($_POST['submit'])){

	$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');
	//securely grab data the user entered
	$user = mysqli_real_escape_string($dbc, trim($_POST['user'])); 
	$password = mysqli_real_escape_string($dbc, trim($_POST['password'])); 
	//look up user and password in database
	$query= "SELECT * FROM users WHERE user='$user' AND password=SHA('$password')";
	$data = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
	
	if(mysqli_num_rows($data) == 1){
	  $row = mysqli_fetch_array($data);
	  setcookie('user', $row['user'], time() + (60*60*24*30)); //expires in 30 days
    	  setcookie('first', $row['first'], time() + (60*60*24*30)); //expires in 30 days
    	  setcookie('last', $row['last'], time() + (60*60*24*30)); //expires in 30 days
    	  header('Location: index.php');
	}else{
	  $feedback = '<b>Could not find and account for<i> '.$_POST['user'].'</i>. Would you like to <a href="signup.php">Create an account?</a></b>';
	}

}//end if
				
			
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
<div id="content" class="container align-center">
     <div class="card bg-light border-dark">
	<div class="card-body">
		  <h1 class="card-title text-success">Log In</h1>
		    <?php echo $feedback;?>
			<form id="myForm" action="" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">					
					<label for="user">Username:</label>
					<input type="text" class="form-control" width="50%" name="user" value="<?php if(!empty($user)) echo $user; ?>" required><br/>
					
					<label for="password">Password:</label>
					<input type="password" class="form-control" width="50%" name="password" required><br/>
				  
					<br><button type="submit" name="submit" class="btn btn-dark btn-lg">Log in</button>
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
