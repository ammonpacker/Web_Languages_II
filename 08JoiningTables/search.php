<?php
require_once('variable.php');

//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
//build query
$query = "SELECT * FROM emphasis ORDER BY eid";
	
//talk to database
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));	




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

<?php include_once('header.php');?>
<div class="jumbotron text-center">
    <h1 class=" text-danger">CS Student Finder</h1>
    <h3>Search by Emphasis</h3>
    <b class="text-success">| 
    <?php 
    
      while($row = mysqli_fetch_array($result)){
      	echo '<a class="text-success" href="index.php?emphasis='.$row['eid'].'">';
      	echo ' '.$row['value'].' |'; 
      	echo '</a>';    	
      };
   ?>
   </b>
        
</div>
<div id="content" class="container">

</div>
<?php mysqli_close($dbc);?>


     	     	       



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



