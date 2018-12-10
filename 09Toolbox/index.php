<?php
require_once('variable.php');

//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
//build query
$query = "SELECT * FROM how ORDER BY name ASC";
	
//talk to database
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
				
// function to convert month number to month name
function convertMonth($x){
  switch($x){
    case 1:
      $y = "January";
      break;
    case 2:
      $y = "February";
      break;
    case 3:
      $y = "March";
      break;
    case 4:
      $y = "April";
      break;
    case 5:
      $y = "May";
      break;
    case 6:
      $y = "June";
      break;
    case 7:
      $y = "July";
      break;
    case 8:
      $y = "August";
      break;
    case 9:
      $y = "September";
      break;
    case 10:
      $y = "October";
      break;
    case 11:
      $y = "November";
      break;
    case 12:
      $y = "December";
      break;                           
  }//end case
  return $y;
}//end function


?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Profile3/profile3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Toolbox</title>
</head>

<body>
<?php include_once('header.php');?>
<div id="content" class="container-fluid">
     <div class="jumbotron jumbotron-fluid text-center">
        <h1><i class="fas fa-toolbox"></i> The How To Blog <i class="fas fa-toolbox"></i></h1>
     </div>
     <?php
     
     while ($row = mysqli_fetch_array($result)) {
        $day = substr($row['date'], 0, 2);
        $monthNum = substr($row['date'], 3, 2);
        $monthName = convertMonth($monthNum);
        $year = substr($row['date'], 6, 4);
        
     	echo '<div class="card">'; 
     	echo '<div class="card-body">';
     	echo '<h3>'.$row['name'].'</h3>';     	
     	echo '<b class="card-title">'.'How To '.$row['topic'].'</b>';
     	echo '<p class="card-text">'.$row['comment'].'</p>';
     	echo '<p>'.'Date written: '.$monthName.' '.$day.', '.$year.'</p>';
     	echo '</div>';
     	echo '</div>';
     }
     
     ?>

</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



