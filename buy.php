<?php
	// enable sessions
	session_start();

    // get MySQL login data
    require "scripts/common.php";
    //check login
    require "scripts/check_login.php";
    // php for right column
    require "scripts/right_column.php";
    
    
    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
    	check_login();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<title>Insert title here</title>
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
			<li><a href="bye.php">Logout</a></li>
		</ul>
	</div>
	<div id="content-container">
		<div id="content">
			<h2>
				Buy stocks!
			</h2>
			<p>
		  <?php 
		  if ($_SESSION["authenticated"] != TRUE){
		  	
		  	echo "Please log in to use this service!";
		  	
		  }
		  else {

		  	echo "<h2>Buy your favorite stocks:	</h2>";	
			  
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
		  }
			
			  
			 
		
?>
			
		</div>
		<div id="aside">
			<?php fill_right_column(); ?>
		</div>
		<div id="footer">
			Copyright © Cornelius Baier, Online Stock-Market, 2012
		</div>
	</div>
</div>

</body>
</html>
       