<?php
                    $when_it_happened = $_POST['whenithappened'];
                    $seen_dog = $_POST['seendog'];
                    $comments = $_POST['comments'];
                    $email = $_POST['email'];
                
                    echo 'Thanks for submitting the form.<br/>';
                    echo 'You were abducted ' . $when_it_happened;
                    echo 'Was Fang there? ' . $seen_dog . '>br/>';
                    echo 'Your email address is ' . $email;
                    mail($email,"Abduction Report",$comments);
                ?>