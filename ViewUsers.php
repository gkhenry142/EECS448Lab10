<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "granthenry", "thie4Eed",
"granthenry");
    echo "<html>";
      echo "<body>";
          if ($mysqli->connect_errno) 
          {
            echo "Connect failure";//Happens if mysql cannot connect
            exit();
          }
          else
          {
            $query = "SELECT user_id FROM Users";
            $userExist = $mysqli->query($query);
            if($userExist->num_rows >= 1)//Confirms whether there are any users at all.
            {
                echo "Here are the users in this database:</br>";
                while($rowList = $userExist->fetch_assoc())
                {
                    echo "Id: " . $rowList["user_id"] . "</br>";
                    //I learned from W3Schools that I could derive certain data from the mysql users table with the fetch_assoc() command.
                }
            }
            else
            {
                echo "There are no users in this database";
            }
          }
            //closes connection once the process is finished
            $mysqli->close();
      echo "</body>";
    echo "</html>";
?>   