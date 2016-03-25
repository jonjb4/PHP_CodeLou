<?php

date_default_timezone_set('America/New_York');
//include("db.php");
include("comments.php");

?>
                
<!DOCTYPE html>
<html>

  <head>
    <title>Name to be determined, fix later!!!!!!</title>

    

    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
  </head>
  
  <body>
    
    <header>
      
      <h1>Working title</h1>
      
    </header>
      
    
    
    
    
    
    
    <?php
      session_start();
      if(isset($_SESSION['comments'])!="")
      {
          header("Location: home.php");
      }
      include_once 'db.php';

      if(isset($_POST['btn-signup']))
      {
          $uname = mysql_real_escape_string($_POST['uname']);
          $email = mysql_real_escape_string($_POST['email']);
          $upass = md5(mysql_real_escape_string($_POST['pass']));

          $uname = trim($uname);
          $email = trim($email);
          $upass = trim($upass);

          // email exist or not
          //$query = "SELECT user_email FROM comments WHERE user_email='$email'";
          $query = "SELECT email FROM comments WHERE email='$email'";
          $result = mysql_query($query);
          
          $count = mysql_num_rows($result); // if email not found then register

          if($count == 0){

              if(mysql_query("INSERT INTO comments(user_id,email,password) VALUES('$uname','$email','$upass')"))
              {
                  ?>
                  <script>alert('successfully registered ');</script>
                  <?php
              }
              else
              {
                  ?>
                  <script>alert('error while registering you...');</script>
                  <?php
              }		
          }
          else{
                  ?>
                  <script>alert('Sorry Email ID already taken ...');</script>
                  <?php
          }

      }
      ?>

        <div id="login-form">
        <form method="post">
        <table align="center" width="30%" border="0">
        <tr>
        <td><input type="text" name="uname" placeholder="User Name" required /></td>
        </tr>
        <tr>
        <td><input type="email" name="email" placeholder="Your Email" required /></td>
        </tr>
        <tr>
        <td><input type="password" name="pass" placeholder="Your Password" required /></td>
        </tr>
        <tr>
        <td><button type="submit" name="btn-signup">Sign Me Up</button></td>
        </tr>
          
          
        <!--<tr>
        <td><a href="header.php">Sign Me Up</a></td>
        </tr>-->  
        <tr>
        <td><a href="login.php">Sign In Here</a></td>
        </tr>
        </table>
        </form>
        </div>
    
    
      
      <div>
        
        <?php
          echo
            "<form method='POST' action='".setComments($conn)."'>
              <input type='hidden' name='user_id' value='Anonymous' >
              <input type='hidden' name='date' value='".date('Y-M-d h:i:s')."' >
              <textarea name='comment' ></textarea><br>
              <button type='submit' name='commentSubmit' >Comment</button>
              
            </form>";
            
            getComments($conn)

        ?>
        
        
      </div>
      
    <footer>
      
    </footer>
      
  </body>
    
</html>





