<?php

	if(!isset($_COOKIE['user'])){        	
          echo '<h2>Uh oh!</h2>';
    	  echo '<h4>You are not logged in. Please <a href="login.php">log in here</a> to access this page.</h4>';   	  
    	  exit();
	}; //end of isset

?>
