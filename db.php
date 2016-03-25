<?php

$conn = mysqli_connect('localhost', 'root', '', 'frankenstein');

if (!$conn) {
  die("Connection failed".mysqli_connect_error());
}











error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysql_connect('localhost', 'root', '', 'frankenstein'))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("frankenstein"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

