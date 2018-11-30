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
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>
<title>Write Message</title>
<?php include_once('header.php');?>
<div class="container">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Write Message</h4>
                <form id="myForm" action="email.php" method="POST" name="message">
                  <div class="form-group" id="form">
                    <label for="subject" >Subject:</label>
                    <input type="text" class="form-control" width="50%" name="subject" id="subject" placeholder="Subject" required><br/>
                    <label for="from">From:</label>
		    <input type="text" class="form-control" width="50%" name="from" placeholder="Write your email here" required><br/>
                    <input type="hidden" name="id" value="<?php echo $found['id']?>"/>  
                    <label for="message" >Message:</label>
                    <textarea id="comments" name="message" class="form-control" rows="3" cols="50"></textarea><br/>

                  <button type="submit" value="Send" class="btn btn-dark btn-lg">Send Message</button>
                </div>
            </form>
  </div>
</div>

          </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  



</body>

</html>
