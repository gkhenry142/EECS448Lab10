<?php
$userInput = $_POST["frontEndInput"]; 
$mysqli = new mysqli("mysql.eecs.ku.edu", "granthenry", "thie4Eed",
"granthenry");
    echo "<html>";
      echo "<body>";
          if ($mysqli->connect_errno) 
          {
            echo "Connect failure"; //This happens if the php file can't establish a connection to the mysql database.
            exit();
          }
          else
          {
            if(empty($_POST["frontEndInput"]))
            {

            }
            else
            {
              $query = " INSERT INTO Users (user_id) VALUES ('$userInput') "; //THis will insert your username input into the database
                if ($mysqli->query($query) === TRUE) 
                {
                  echo "New record created successfully</br>";//Confirmation that it worked properly
                  echo "Hit the back button on your browser to either create another user or return to the admin home.</br>";
                } 
                else 
                {
                  echo "Error: " . $mysqli->error . "</br>";//Error if you try to install a duplicate
                  echo "Hit the back button on your browser to try again </br>";
                }
            }
          }
            //closes the connection, proper coding according to our lab information sheet
            $mysqli->close();
      echo "</body>";
    echo "</html>";
?>   