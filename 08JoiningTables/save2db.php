<?php
$first = $_POST['first'];
$last = $_POST['last'];
$website = $_POST['website'];
$gender = $_POST['gender'];
$emphasis = $_POST['emphasis'];


require_once('variable.php');

//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           

//insert into database
$query = "INSERT INTO students (first, last, gender, website, emphasis) VALUES('$first', '$last', '$gender', '$website', '$emphasis')";
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));	

//-----------------------UPDATE SOFTWARE SKILLS---------------------
//this is the id of the user just entered
$recent_id= mysqli_insert_id($dbc);

//loop through the array the contains all the skills they selected. 
foreach($_POST['skills'] as $skill_id){
  $query = "INSERT INTO student_skills (id, skill_id) VALUES($recent_id, $skill_id)";
  $result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
};//end of foreach

//hang up
mysqli_close($dbc);

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
     <div class="jumbotron jumbotron-fluid text-center">
        <h1 class="text-success">You have succesfully entered a new student.</h1>
        <a class="btn btn-dark btn-lg" href="index.php">Return to Home page</a>
        <a class="btn btn-dark btn-lg" href="new.php">Add another student</a>
     </div>

</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



</html>
