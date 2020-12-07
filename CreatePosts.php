<?php
$userInput = $_POST["frontEndInput"];
$postContent = $_POST["frontEndPost"];
$randomNumberGenerator = rand(1, 1000); 
$mysqli = new mysqli("mysql.eecs.ku.edu", "granthenry", "thie4Eed",
"granthenry");
    echo "<html>";
      echo "<body>";
          if ($mysqli->connect_errno) 
          {
            echo "Connect failure";//If php cant connect to mysql database
            exit();
          }
          else
          {
            if(empty($_POST["frontEndInput"]) || empty ($_POST["frontEndInput"]))
            {
                //echo "Please fill in all necessary data, hit the back button on your browser to try again.</br>";
                //This kept on showing on the main page so I had to comment it out.
            }
            else
            {
                $query = "SELECT user_id FROM Users WHERE user_id='$userInput'";//Tries to find whether your user input matches with a user in the database
                $userExist = $mysqli->query($query);
                if($userExist->num_rows >= 1)
                {
                    echo "User found in database</br>";//Confirms the user was found
                    $storeAuthorId = "INSERT INTO Posts (post_id, content, author_id) VALUES ('$randomNumberGenerator','$postContent', '$userInput')";//Post content is installed into the Posts table
                    if ($mysqli->query($storeAuthorId) === TRUE) 
                    {
                        echo "New record created successfully</br>";//Confirmation that the process worked.
                    } 
                    else 
                    {
                        echo "Error: " . $mysqli->error . "</br>";//Error shown if your post/username is invalid
                    }
                }
                else
                {
                    echo "Error. User Not Found";//Error if your username input is invalid.
                }
            }
          }
            //close connection, needed for proper mysql interaction
            $mysqli->close();
      echo "</body>";
    echo "</html>";
?>   