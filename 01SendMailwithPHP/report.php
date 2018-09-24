     <?php
	      $name = $_POST['firstName'].' '.$_POST['lastName'];
        $when_it_happened = $_POST['whenithappened'];
        $seen_dog = $_POST['seendog'];
        $comments = $_POST['comments'];
        $email = $_POST['email'];
        $to = 'ammon.packer@gmail.com';
        $subject = "ALIENS ABDUCTED ME";
        $msg = "$name was abducted $when_it_happened.\n" .
		    "Fang spotted? $seen_dog. \n" .
                "email is: $email\n" .
              	"Other comments: $comments";              
	      mail($to, $subject, $msg, 'From: ' . $email);
       	echo 'Thanks for submitting the form.<br/>';
        echo 'You were abducted on ' . $when_it_happened . '<br/>';
	      if(isset($_POST['seendog'])){
	      echo "Was Fang there? ".$_POST['seendog'] . '<br/>';  //  Displaying Selected Value
	      }
        echo 'Your email address is ' . $email;                
     ?>
