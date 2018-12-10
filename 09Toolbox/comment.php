<?php
if(isset($_POST[submit])){
  
    
  require_once('variable.php');
//building database connection      	
  $dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');          

  $name = $_POST[name];
  $day = $_POST[day];
  $month = $_POST[month];
  $year = $_POST[year];
  $topic = mysqli_real_escape_string($dbc, $_POST['topic']);
  $comment = mysqli_real_escape_string($dbc, $_POST['comment']);
  $timer = $day.'_'.$month.'_'.$year;
	
//build query 
  $query = "INSERT INTO how (name, date, topic, comment)"."VALUES('$name','$timer','$topic','$comment')";
	
//talk to database
  $result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
				
//close connection
  mysqli_close($dbc);

  header('Location: index.php');
  exit;
}
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
<div class="container">
     <div class="card bg-light">
	<div class="card-body">
		<h4 class="card-title">Write a How To Post</h4>
			<form class="" id="myForm" action="comment.php" method="post" enctype="multipart/form-data">
				<div class="form-group" id="form">
					<label for="name">Name:
					<input type="text" class="form-control" width="50%" name="name" id="first" placeholder="Full Name" required><br/>
					</label><br>
					<label for="date">Date Written: 
					<select name="month" class="form-control" >
					    	<option>Month</option>
					    	<option>01</option>
					    	<option>02</option>
					    	<option>03</option>
					    	<option>04</option>
					    	<option>05</option>
					    	<option>06</option>
					    	<option>07</option>
					    	<option>08</option>
					    	<option>09</option>
					    	<option>10</option>
					    	<option>11</option>
					    	<option>12</option>
					</select><br>
					<select name="day" class="form-control" >
					    	<option>Day</option>
					    	<option>01</option>
					    	<option>02</option>
					    	<option>03</option>
					    	<option>04</option>
					    	<option>05</option>
					    	<option>06</option>
					    	<option>07</option>
					    	<option>08</option>
					    	<option>09</option>
					    	<option>10</option>
					    	<option>11</option>
					    	<option>12</option>
					    	<option>13</option>
					    	<option>14</option>
					    	<option>15</option>
					    	<option>16</option>
					    	<option>17</option>
					    	<option>18</option>
					    	<option>19</option>
					    	<option>20</option>
					    	<option>21</option>
					    	<option>22</option>
					    	<option>22</option>
					    	<option>23</option>
					    	<option>24</option>
					    	<option>25</option>
					    	<option>26</option>
					    	<option>27</option>
					    	<option>28</option>
					    	<option>29</option>
					    	<option>30</option>
					    	<option>31</option>
					</select><br>
					
					<input type="year" class="form-control" name="year" pattern="^[0-9]{4}$" oninvalid="this.setCustomValidity('Year must contain only 4 digits.')" oninput="this.setCustomValidity('')" placeholder="Year" required>
					</label><br>
						
					<label for="topic">Post Title: 
					How to<input type="text" class="form-control" width="50%" name="topic" placeholder="Make a thingy" required>
					</label><br>
					<label for="comment">Write Post:
                   			<textarea id="comment" name="comment" class="form-control" rows="3" cols="50" required></textarea>
                   			</label><br/>
					<br><button type="submit" name="submit" class="btn btn-dark btn-lg">Post</button>
					<a href="index.php" class="btn btn-dark btn-lg" role="button">Cancel</a>
				</div>
			</form>
	</div>

</div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



</html>
