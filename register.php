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
        
        $sql = sprintf("INSERT INTO users(user_id, username,password, email, money) VALUES(NULL, '$user', '$pass', '$mail', 10000)");
   
        // execute query
        $result = mysql_query($sql);
        if ($result === FALSE)
            die("Could not query database");

 
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<title>Please register</title>
</head>
<body>

<div id="container">
	<div id="header">
		<h1>
			Online Stock-Market
		</h1>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="welcome.php">Login/Welcome</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="buy.php">Buy</a></li>
			<li><a href="sell.php">Sell</a></li>
			<li><a href="account.php">Account</a></li>
		</ul>
	</div>
	<div id="content-container">
		<div id="content">
			<h2>
				 Please enter your data:
			</h2>
	 
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
		</div>
		<div id="aside">
			<h3>
				Aside heading
			</h3>
			<p>
				Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.
			</p>
		</div>
		<div id="footer">
			Copyright © Cornelius Baier, Online Stock-Market, 2012
		</div>
	</div>
</div>

</body>
</html>