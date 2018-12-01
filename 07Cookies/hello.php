<p class="text-right"> Hello,

  <?php
    if(isset($_COOKIE['user'])){
      echo $_COOKIE['first'].' '.$_COOKIE['last'];
      echo ' | <a href="logout.php">Sign out</a>';   
    }else{
      echo ' | <a href="login.php">Login</a>'; 
    }
  ?>

</p>
