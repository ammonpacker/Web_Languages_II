<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>
  <title>Web Lang II Project 4</title>

  <div class="container">
    <div class="card bg-warning">
      <div class="card-body">
        <h4 class="card-title">Manage Newsletter Emails</h4>
        <form id="myForm" action="<?php $SERVER['PHP_SELF'];?>" method="POST">
          <p>Please select people the emails you would like to remove.</p>

     		<?php
  	  		//building database connection      	
			    $dbConnection = mysqli_connect('localhost','ammonp93_dgmusr','CA}x]ee1&G*%','ammonp93_dgm3760') or die('Connection to the Database failed.');           
	
	  		  //DELETE SELECTED RECORDS
  			  if(isset($_POST['submit'])){
  			  	//var_dump($_POST['delete']);
				    foreach($_POST['delete'] as $delete_id){
				       
				      $query = "DELETE FROM Newsletter WHERE id=$delete_id ";
				  
				      $result = mysqli_query($dbConnection, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbConnection));
				  };//end of foreach
				
			  }; //end of if
	
			  //DISPLAY RECORDS
			
			  //build query
		  	$query = "Select * from Newsletter ";
	
			  //talk to database
			  $result = mysqli_query($dbConnection, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbConnection));
	
			  //close connection
			  mysqli_close($dbConnection);
				
			  while($row = mysqli_fetch_array($result)){
				  echo '<label>';
			  	  echo '<input type="checkbox" value="'.$row['ID'].'" name="delete[]" />';
				  echo ' ' . $row['first'] . ' ' . $row['last'] . ' - ' . $row['email'];
				  echo '</label>';
				  echo '<br>';
			  	  //echo $row['id'];
			  };
  		?>
            <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Remove From List" />

        
        </form>
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>




</body>

</html>
