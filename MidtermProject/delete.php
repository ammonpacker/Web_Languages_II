<?php
require_once('authorize.php');
$id = $_POST['id'];
require_once('variable.php');
//building database connection      	
$dbc = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die('Connection to the Database failed.');           

$query = "DELETE FROM research WHERE id=$id";
$result = mysqli_query($dbc, $query) or die("Query: ". $query."<p>Error: " .mysqli_error($dbc));
@unlink($_POST['photo']);
mysqli_close($dbc);
//return to approve page
header('Location: manage.php');

?>
