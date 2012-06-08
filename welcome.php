<?
    /**
     * login6.php
     *
     * A simple login module that checks a username and password
     * against a MySQL table with no encryption by asking for a binary answer.
     *
     * David J. Malan
     * Computer Science E-75
     * Harvard Extension School
     */

    // enable sessions
    session_start();

    // connect to database
    if (($connection = mysql_connect("localhost", "baier", "aro4wp")) === FALSE)
        die("Could not connect to database");

    // select database
    if (mysql_select_db("test", $connection) === FALSE)
        die("Could not select database");

    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
        // prepare SQL
        // sprintf: creating a string, allowing to hold placeholders to avoid sql injection
        $sql = sprintf("SELECT 1 FROM users WHERE user='%s' AND pass='%s'",
                       mysql_real_escape_string($_POST["user"]),
                       mysql_real_escape_string($_POST["pass"]));

        // execute query
        $result = mysql_query($sql);
        if ($result === FALSE)
            die("Could not query database");

        // check whether we found a row
        if (mysql_num_rows($result) == 1)
        {
        	echo "welcome " . $_POST["user"];
        	
            // remember that user's logged in
            $_SESSION["authenticated"] = TRUE;

            // redirect user to home page, using absolute path, per
            // http://us2.php.net/manual/en/function.header.php
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/home.php");
            exit;
        }
        else{
        	echo "fuck off";
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Log In</title>
  </head>
  <body>
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
          <td></td>
          <td><input type="submit" value="Log In" /></td>
        </tr>
      </table>      
    </form>
  </body>
</html>
