<?php
  $emp_id = $_GET[id];
  //building database connection      	
  $dbc = mysqli_connect('localhost','ammonp93_dgmusr','CA}x]ee1&G*%','ammonp93_dgm3760') or die('Connection to the Database failed.');           
	
  //build query
  $query = "SELECT * FROM employee WHERE id=$emp_id";
	
  //talk to database
  $result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
	
  $found = mysqli_fetch_array($result);
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
				<h4 class="card-title">Update Employee</h4>
				<form id="myForm" action="updateDB.php" method="post" enctype="multipart/form-data">
					<div class="form-group" id="form">
						<label for="firstName">First Name:</label>
						<input type="text" class="form-control" width="50%" name="first" id="first" value="<?php echo $found['first']?>"  required><br/>

						<label for="lastName">Last name:</label>
						<input type="text" class="form-control" name="last" id="last" value="<?php echo $found['last']?>" required><br/>

						<label for="phone">Phone:</label>
						<input type="phone" class="form-control" name="phone" id="phone" value="<?php echo $found['phone']?>" required><br/>
						
						<label for="department">Select Department:</label>
						<select name="dept" class="form-control" id="sel1">
							<option><?php echo $found['dept']?></option>
							<option>--------------</option>
						    	<option>Department of Technology and Engineering</option>
						    	<option>Department of Mathematics</option>
						    	<option>Department of Biology</option>
						    	<option>Department of Fine Arts</option>
						</select><br>
						
						<input type="hidden" name="id" value="<?php echo $found['id']?>"/> 
					
						<br><button type="submit" class="btn btn-dark btn-lg">Update</button>
						<a href="home.php" class="btn btn-dark btn-lg" role="button">Cancel</a>
					</div>
				</form>
				<?php require_once('footer.php');?>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>




</body>

</html>
