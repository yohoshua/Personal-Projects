<?php

$db = mysql_connect("localhost", "janeand3_admin", "JKwnsdud1") or die("Could not connect.");

if(!$db) 

	die("no db");

if(!mysql_select_db("janeand3_guestbook",$db))

 	die("No database selected.");

if(!get_magic_quotes_gpc())

{

  $_GET = array_map('mysql_real_escape_string', $_GET); 

  $_POST = array_map('mysql_real_escape_string', $_POST); 

  $_COOKIE = array_map('mysql_real_escape_string', $_COOKIE);

}

else

{  

   $_GET = array_map('stripslashes', $_GET); 

   $_POST = array_map('stripslashes', $_POST); 

   $_COOKIE = array_map('stripslashes', $_COOKIE);

   $_GET = array_map('mysql_real_escape_string', $_GET); 

   $_POST = array_map('mysql_real_escape_string', $_POST); 

   $_COOKIE = array_map('mysql_real_escape_string', $_COOKIE);

}



?>

