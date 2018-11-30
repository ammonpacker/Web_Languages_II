<?php
require_once('authorize.php');

require_once('variable.php');

//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
//build query
$query = "SELECT * FROM research ORDER BY last ASC";
	
//talk to database
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));

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
    <title>Midterm Project</title>
</head>

<body>
<?php include_once('header.php');?>
<div id="content" class="container-fluid">
     <div class="jumbotron jumbotron-fluid text-center">
        <h1>Employees</h1>
     </div>
     <?php
     if(mysqli_num_rows($result) == 0){
     	echo '<p> There are no employees in this department </p>';
     }else {
     	while ($row = mysqli_fetch_array($result)) {
     		echo '<div class="card" style="width:250px">';
     		echo '<div class="card-body">';
     		echo '<img class="card-img-top" src="'.$path.$row['image'].'" alt="photo"/>'.'<br>';
     		echo '<h3>'.$row['last'].', '.$row['first'].'</h3>';     	
     		echo '<b class="card-title">'.$row['expertise'].'</b>'.'<br>';
     		echo '<a class="btn btn-success" href=bio.php?id='.$row['id'].'>Write Bio</a>'.' ';
     		echo '<a class="btn btn-danger" href=deleteView.php?id='.$row['id'].'>Delete</a>';
     		echo '</div>';
     		echo '</div>';
     	}//end of while
     }
     ?>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



