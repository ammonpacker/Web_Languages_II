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
		<h4 class="card-title">Bio for <?php echo $found['first'].' '.$found['last'];?> </h4>
			<form id="myForm" action="bio2.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					
					<?php 
					  echo '<div style="width:250px">';
					  echo '<img class="card-img-top" src="'.$path.$found['image'].'" alt="profile photo"/>'.'<br>';
					  echo '</div>';
					?>
					<label for="special">Write the Bio here:</label>
                   			<textarea type="text" id="bio" name="bio" class="form-control" rows="3" cols="10" required></textarea><br/>
                   			<input type="hidden" name="id" value="<?php echo $found['id']?>"/>  
					<br><button type="submit" class="btn btn-dark btn-lg">Update</button>
					<a href="manage.php" class="btn btn-dark btn-lg" role="button">Cancel</a>
				</div>
			</form>
	</div>

</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



</html>
