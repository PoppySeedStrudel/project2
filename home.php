<?php
  
// enable sessions
session_start();

// php for right column
require "scripts/right_column.php";
//check login
require "scripts/check_login.php";
check_login();


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
				welcome! </ br>
	
					<?php 
						if ($_SESSION["authenticated"] === TRUE){
							echo "true<br>";
							$user = $_SESSION["user"];
							echo $user;
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
