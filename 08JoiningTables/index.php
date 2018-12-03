<?php
$query_addition= '';
if(isset($_GET[emphasis])){
  $query_addition="WHERE emphasis=$_GET[emphasis]";
}
require_once('variable.php');

//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
//build query
$query = "SELECT * FROM students INNER JOIN emphasis ON (students.emphasis = emphasis.eid) $query_addition ORDER BY last";
	
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
<div class="jumbotron ">
 <?
   if(mysqli_num_rows($result)==0){
     echo '<h1 class="text-center text-danger">Sorry, no one matches the requested search.</h1>';
     exit();
   };  
 ?> 
    <h1 class="text-center text-danger">Computer Science Students</h1>    
</div>
<div id="content" class="container">
     
     <?php
     
     while ($row = mysqli_fetch_array($result)) {
     	echo '<div class="card">';
     	echo '<div class="card-body bg-light">';
     	echo '<h4 class="card-title text-success">'.$row['first'].' '.$row['last'].'</h4>'; 
     	echo '<p class="card-text text-success">';
     	echo '<p>';
     	echo ($row['gender'] == 1 ? 'Mr. ':'Ms. ').$row['last'];
     	echo ' is a Computer Science student emphasizing in '.$row['value'].'<br>'; 
     	echo ($row['gender'] == 1 ? 'He ': 'She ');
     	echo 'is proficient in the following technological skills:';
     	
     	$theid = $row['id'];    	
     	$query2 = "SELECT * FROM student_skills INNER JOIN skills ON (student_skills.skill_id = skills.sid) WHERE id=$theid";
     	$skillResult = mysqli_query($dbc, $query2) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
	echo '<ul class="text-danger">';
	while($row2 = mysqli_fetch_array($skillResult)){
	  echo '<li>'.$row2['skill'].'</li>';
	
	}
	echo '</ul>';
	echo '</p>';
     	echo '</div>';
     	echo '</div>';
     }
     //echo '<h3>'.$row['location'].'<a class="btn btn-danger float-right" href=detail.php?id='.$row['id'].'>show details</a>'.'</h3>';
     ?>
    <br>
 

</div>
<?php mysqli_close($dbc);?>


     	     	       



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



