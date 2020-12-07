<?php

$userSelection = $_POST['$rowlist["user_id"]'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "granthenry", "thie4Eed",
"granthenry");
    echo "<html>";
      echo "<body>";
        //echo "PHP Successfully loaded.</br>";
          if ($mysqli->connect_errno) 
          {
            echo "Connect failure";
            exit();
          }
          else
          {
            if(isset($_POST['$rowlist["user_id"]']))//I tried to link a variable to the checked inputs in the html page, but I couldn't get that to work properly.
            {
                echo "Something was selected. </br>";
            }
            else
            {
                echo "Any post(s) associated with this user can be seen below:</br>";
                echo '$rowList["user_id"]';
                $queryForDeleting = "DELETE FROM POSTS WHERE author_id = '$userSelection'";//Because I was not able to get this variable to link properly with the checked input(s),
                $deletionConfirmed = $mysqli->query($queryForUserPost);                    //I could not get the delete command to work properly either.
                if($deletionConfirmed === TRUE)                                            //I think that I could have gotten it to work with radio inputs, but I can't be sure.
                {                                                                          //I hope you can show me where I went wrong!
                    echo "Entry successfully deleted.</br>";
                }
            }
          }
            //closes connection
            $mysqli->close();
      echo "</body>";
    echo "</html>";
?>   