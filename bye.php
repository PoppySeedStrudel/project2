<?php

	 $_SESSION["authenticated"] = FALSE;
	 session_destroy(); 
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<title>Log out</title>
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
				You are logged out. 
			</h2>
			<?php 
				if ($_SESSION["authenticated"] == FALSE){
					echo "false"; 
				}
				else {echo "true";}
				?>
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