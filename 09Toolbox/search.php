<!DOCTYPE html>
<html lang="en">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Profile3/profile3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Toolbox</title>
</head>

<body>
<?php include_once('header.php');?>
<div class="container">
     <div class="card bg-light">
	<div class="card-body">
		<h2 class="card-title text-center ">Search Posts</h2>
			<form class="" id="myForm" action="search.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					<label for="search"><b><i class="fas fa-search"></i> Search a Topic:</b></label>
					<input type="text" class="form-control" width="100%" name="search"><br>
					Seperate multiple search terms with a ,<br>
					<br><button type="submit" name="submit" class="btn btn-dark btn-block"><i class="fas fa-search"></i> Search</button>
				</div>
			</form>
	</div>
<?php
if (isset($_POST['submit'])){
  // remove uppercase letters
  $search = strtolower($_POST['search']);
  //replace commas with space
  $searchCleanUP = str_replace(',',' ',$search);
  //turn search into array based on space character.
  $searchTerms = explode(' ',$searchCleanUP);
  
  foreach($searchTerms as $tmp){
    if(!empty($tmp)){
      $searchArray[] = $tmp;
      
    }
  }//end foreach
  //Build the WHERE clause for the query
  $wherelist =  array();
  foreach($searchArray as $tmp){
    $whereList[] = "topic LIKE '%$tmp%'";
  }// end foreach
  //build complete WHERE with OR between each term.
  $whereClause = implode(' OR ', $whereList);
  
        
	
}
//build query
$query = "SELECT * FROM how";
if(!empty($whereClause)){
  $query .= " WHERE $whereClause ";
}
echo '<div class="">';
echo "<h2>Search Results for '$searchCleanUP'</h2>";
echo '</div>';

  //building database connection
  require_once('variable.php');      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.'); 
//talk to database
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
 
if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_array($result)){
     
      
      echo '<div class="card">'; 
      echo '<div class="card-body">';
      echo '<h3>'.$row['name'].'</h3>'; 
      
      $myResults = strtolower($row['topic']);
      foreach($searchArray as $tmp){
      	$insert = '<***>'.$tmp.'</***>';
        $myResults = str_replace($tmp, $insert, $myResults);
      }
      $myResults = str_replace('/***', 'span', $myResults);
      $myResults = str_replace('***', 'span class="text-success"', $myResults);
      
          	
      echo '<b class="card-title">'.'How To '.$myResults.'</b>';
      echo '<p class="card-text">'.$row['comment'].'</p>';
      echo '</div>';
      echo '</div>';
   }
} 

?>
</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



</html>
