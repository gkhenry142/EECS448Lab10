<?php

$userSelection = $_GET["users"];
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
            if(empty($_GET["users"]))
            {
                echo "Sorry you didn't select a user. </br>";
            }
            else
            {
                $queryForUserSelection = "SELECT user_id FROM Users WHERE user_id = '$userSelection'";
                //$queryForUserSelection = "SELECT Users.user_id, Posts.content FROM Users INNER JOIN POSTS ON Users.user_id = Posts.author_id WHERE user_id = '$userSelection'";
                //I first tried to have a 2-tiered system where I first selected the user_id in the Users table, 
                //and then would select the content associated with the Posts author_id, which matches the Users table's user_id
                //But this didn't work, so I tried to use the INNER JOIN command shown in the Lab10 information sheet, but I wasn't able to get that to work either.
                $userExist = $mysqli->query($queryForUserSelection);
                if($userExist->num_rows >= 1)
                {
                    echo "Any post(s) associated with this user can be seen below:</br>";
                    $queryForUserPost = "SELECT (post_id, content, author_id) FROM POSTS WHERE author_id = '$userSelection'";
                    $postExistsForUser = $mysqli->query($queryForUserPost);
                    while($userContent = $postExistsForUser->fetch_assoc()) 
                    {
                        echo "Post Content: " . $userContent["content"] . "<br>";//It should derive the Post content here, but it didnt work.
                    }
                }
                else
                {
                    echo "There are no users in this database";
                }
            }
          }
            //closes the connection once the process is finished.
            $mysqli->close();
      echo "</body>";
    echo "</html>";
?>   