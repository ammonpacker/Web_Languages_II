<?php include_once('protect.php');?>
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
		  <h4 class="card-title">Report an Outage</h4>
			<form id="myForm" action="insert.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					<label for="location">Location:</label>
					<input type="text" class="form-control" width="50%" name="location" required><br/>
					
					<label for="date">Date:</label>
					<input type="date" class="form-control" width="50%" name="date" required><br/>
					
					<label for="time">Time:</label>
					<input type="time" class="form-control" width="50%" name="time" required><br/>
				  
					<br><button type="submit" name="submit" class="btn btn-dark btn-lg">Report</button>
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
