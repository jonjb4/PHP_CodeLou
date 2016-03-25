<?php

date_default_timezone_set('America/New_York');
include("db.php");
include("comments.php");

?>


<!DOCTYPE html>
<html>

  <head>
    <title>Name to be determined, fix later!!!!!!</title>

    <link rel="icon" type="image" href="favicon.ico"> //change this pic here

    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> // will convert phones to moblie css
  </head>
  
  <body>
    
    <header>
      
      <h1>Welcome to the TRASH TALK BOARD for Kentucky and Louisville fans!</h1>
      
    </header>
      
      
      <div>
        
        <?php
          
          $count_id = $_POST['count_id'];
          $user_id = $_POST['user_id'];
          $date = $_POST['date'];
          $comment = $_POST['comment'];
          
          echo 
            "<form method='POST' action='".editComments($conn)."'>
              <input type='hidden' name='count_id' value='".$count_id."' >
              <input type='hidden' name='user_id' value='".$user_id."' >
              <input type='hidden' name='date' value='".$date."' >
              <textarea name='comment' >".$comment."</textarea><br>
              <button type='submit' name='commentSubmit' >Edit</button>
              
            </form>";
            
            
            function editComments($conn) {
              if(isset($_POST['commentSubmit'])) {
                $count_id = $_POST['count_id'];
                $user_id = $_POST['user_id'];
                $date = $_POST['date'];
                $comment = $_POST['comment'];
                
                $sql = "UPDATE comments SET comment='$comment' WHERE count_id='$count_id'";
                $result = $conn->query($sql);
                header("Location: index.php");
              }
            }

        ?>
        
        
      </div>
      
      
      
      
    <footer>
      
    </footer>
      
  </body>
  
  
  
  
  
</html>
