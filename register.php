<?php
 

    // get MySQL login data
    require "common.php";

    // enable sessions
    session_start();

    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
        // connect to database
        if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
            die("Could not connect to database");
    
        // select database
        if (mysql_select_db(DB, $connection) === FALSE)
            die("Could not select database");

        // prepare SQL
        
        $user = mysql_real_escape_string($_POST["user"]);
        $pass = mysql_real_escape_string($_POST["pass"]);
        $mail = mysql_real_escape_string($_POST["mail"]);
        
        $sql = sprintf("INSERT INTO USERS(USER_ID, USERNAME,PASSWORD, EMAIL) VALUES(NULL, '$user', '$pass', '$mail')");
         
        //		mysql_real_escape_string($_POST["user"]),
        	//	mysql_real_escape_string($_POST["pass"]),
        		// mysql_real_escape_string($_POST["mail"]));
        
        // $sql = sprintf("SELECT 1 FROM USERS WHERE USERNAME='%s' AND PASSWORD='%s'",
           //            mysql_real_escape_string($_POST["user"]),
             //          mysql_real_escape_string($_POST["pass"]),
        		//	   mysql_real_escape_string($_POST["mail"]));

        // execute query
        $result = mysql_query($sql);
        if ($result === FALSE)
            die("Could not query database");

 
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Log In</title>
  </head>
  <body>
  Please enter your data:
 <br>
 
    <form action="<? echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td>
            <input name="user" type="text" /></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input name="pass" type="password" /></td>
        </tr>
        <tr>
          <td>E-Mail:</td>
          <td><input name="mail" type="mail" /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Log In" /></td>
        </tr>
      </table>      
    </form>
   
    
  </body>
</html>