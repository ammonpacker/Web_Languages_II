<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>
	<title>Web Lang II Project 5</title>
	<?php include_once('header.php');?>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Employee Registration Confirmation</h4>
				<?php
				require_once('authorize.php');
				$first = $_POST['first'];
				$last = $_POST['last'];
				$expertise = $_POST['expertise'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$special = $_POST['special'];
				$photo = $_POST['photo'];
				
			
				$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
				$filename = $first.$last.time().'.'.$ext;
				$path = 'employees/';
	
			//----------------------Verify Image-------------------------
				$validImg = true;
	
				//image missing
				if($_FILES["photo"]["size"] ==  0){
				   echo 'You did not select an image<br>';
				   $validImg = false; 
				};
				//image is too large
				if($_FILES["photo"]["size"] >  256000){
				   echo 'Image size is larger than 250kb<br>';
				   $validImg = false; 
				};
				//Check file type
				if($_FILES['photo']['type'] == 'image/gif'|| $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/pjpeg'){
				   //Proper Format 
				}else{
				   //tell user not correct
				   echo 'File type is not correct<br>';
				   $validImg = false; 
				};
				
				if($validImg == true){
				  //upload file
				  $tmp_name = $_FILES['photo']['tmp_name'];
				  move_uploaded_file($tmp_name, "$path$filename");
				  @unlink($_FILES['photo']['tmp_name']);
				  
				require_once('variable.php');  
				  //building database connection      	
				$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           
	
				//build query
				$query = "INSERT INTO research (first, last, expertise, phone, email, special, image)"."VALUES('$first','$last','$expertise','$phone', '$email', '$special', '$filename')";
				
	
				//talk to database
				$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
				
				//close connection
				mysqli_close($dbc);
				}else{
				   // try upload again
				  echo '<a href="register.php" class="btn btn-dark" role="button">Please Try Again</a><br>';
				};
				echo $first.' '.$last.'<br>';
				echo $expertise.'<br>';
				echo $phone.'<br>';
				echo $email.'<br>';
				echo '<img src="'.$path.$filename.'" alt="photo"/>';
				
				?>
				
			
			</div>

		

		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>




</body>

</html>


<?php


?>
