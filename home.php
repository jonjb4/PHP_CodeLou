<?php

date_default_timezone_set('America/New_York');
session_start();
include_once 'db.php';
include("comments.php");

if(!isset($_SESSION['comments']))
{
	
    
}


$res=mysql_query("SELECT * FROM comments WHERE count_id=".$_SESSION['comments']);
$userRow=mysql_fetch_array($res);
?>

<head>

<title>Welcome - <?php echo $userRow['user_id']; ?></title>



    <link rel="icon" type="image" href="favicon.ico"> //change this pic here

    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"> // will convert phones to moblie css

</head>
<body>
<div id="header">
    <div id="right">
    	<div id="content">
        	 <?php echo $userRow['user_id']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">

  <div>
        
        <?php
          //$homeID=mysql_query("SELECT user_id FROM comments");
          echo 
            "<form method='POST' action=$user_id>
              <input type='hidden' name='user_id' value='$homeID' >
              <input type='hidden' name='date' value='".date('Y-M-d h:i:s')."' >
              <textarea name='comment' ></textarea><br>
              <button type='submit' name='commentSubmit' >Comment</button>
              
            </form>";
            
            getComments($conn)
            
        ?>
        var_dump();
  
  
</div>

</body>





