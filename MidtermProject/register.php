<?php
require_once('authorize.php');
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Profile3/profile3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Securing The Application</title>
</head>

<body>
<?php include_once('header.php');?>
<div id="content" class="container-fluid">
     <div class="card">
	<div class="card-body">
		<h4 class="card-title">Employee Registration</h4>
			<form id="myForm" action="insert.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					<label for="first">First Name:</label>
					<input type="text" class="form-control" width="50%" name="first" required><br/>
					
					<label for="last">Last Name:</label>
					<input type="text" class="form-control" width="50%" name="last" required><br/>
					
					<label for="phone">Phone:</label>
					<input type="text" class="form-control" width="50%" name="phone" placeholder="000 000 0000" required><br/>
					
					<label for="email">Email:</label>
					<input type="text" class="form-control" width="50%" name="email" placeholder="something@website.com" required><br/>
						
					<label for="expertise">Expertise:</label>
					<select name="expertise" class="form-control" id="expertise">
					    	<option>Medicine</option>
					    	<option>Engineering</option>
					    	<option>Chemistry</option>
					    	<option>Cyber Security</option>
					</select><br>
					
					<label for="special">Describe Your Specialization:</label>
                   			<input type="text" id="special" name="special" class="form-control" rows="3" cols="10" required></input><br/>
					<label for="photo">Select a Photo: </label><br>
						<input type="file" name="photo"><br>
				  
					<br><button type="submit" class="btn btn-dark btn-lg">Register</button>
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
