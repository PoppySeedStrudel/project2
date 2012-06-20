<?php

    // get MySQL login data
    require "common.php";

    // enable sessions
    session_start();


?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Buy</title>
  </head>
  <body>
  
  <?php 

  
  // connect to database
  if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
  	die("Could not connect to database");
  
  // select database
  if (mysql_select_db(DB, $connection) === FALSE)
  	die("Could not select database");
  
  // prepare SQL
  $sql = sprintf("SELECT * FROM stocks");
  
  // execute query
  $result = mysql_query($sql);
  if ($result === FALSE)
  	die("Could not query database");
  
  echo "<form action=\"confirm.php\" method=\"get\"><table border=\"1\">";
  while ( $row = mysql_fetch_array ( $result ) )
  {
  	echo "<tr><td>";
  	echo "<input type=\"text\" size=\"2\" name=\"" . $row[1] . "\"></td><td>";
  	echo $row[0] . ' </td><td>';
  	echo $row[1] . ' </td><td>';
  	echo $row[2] . ' </td><td>';
  	echo $row[3] . '</td>';
  	echo "</tr>";
  }
  echo "</table><p><input type=\"submit\" value=\"Buy!\"></form><p>";
  

  
  ?>

 <p>
<a href="welcome.php">login/welcome </a><br><a href="bye.php">logout </a><br><a href="register.php">register</a><br><a href="buy.php">buy</a><br><a href="account.php">account</a>
  </body>
</html>