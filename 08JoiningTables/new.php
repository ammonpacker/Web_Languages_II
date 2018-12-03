<?php
require_once('variable.php');
//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           

//get emphasis names for emphasis field
$query = "SELECT * FROM emphasis";
$empResult = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));	

//get skills for skills field
$query = "SELECT * FROM skills ORDER BY skill ASC";
$skillResult = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));

		?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Profile3/profile3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Joining Tables</title>
</head>

<body>

<?php include_once('header.php'); ?>
<div id="content" class="container">
     <div class="card bg-light border-dark">
	<div class="card-body">
	
		  <h4 class="card-title">Sign Up</h4>
			<form id="myForm" action="save2db.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					<label for="first">First Name:</label>
					<input type="text" class="form-control" width="50%" name="first" required><br/>
					
					<label for="last">Last Name:</label>
					<input type="text" class="form-control" width="50%" name="last" required><br/>
					
					<label for="website">Website:</label>
					<input type="text" class="form-control" width="50%" name="website" required><br/>
					
					<label for="gender">Select Gender:</label><br>
					<input type="radio" name="gender" value="1"> Male<br>
  					<input type="radio" name="gender" value="2"> Female <br>
  					
  					<br><label for="emphasis">Select Emphasis:</label><br>
  					<select name="emphasis" class="form-control" id="emphasis">
  						<option>Please Select...</option>
  					<?php
  					while($row= mysqli_fetch_array($empResult)){
  					  echo '<option value="'.$row['eid'].'">'.$row['value'].'</option>';
  					};
  					?>					    	
					</select><br> 
					
					<label for="skill">Select Skill:</label><br>
  					<?php
  					while($row= mysqli_fetch_array($skillResult)){
  					  echo '<input type="checkbox" name="skills[]" value="'.$row['sid'].'"> '.$row['skill'].'<br>';
  					};
  					?>
				  
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
