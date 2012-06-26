<?php

    // get MySQL login data
    require "common.php";
    
    require "balance.php";

    // enable sessions
    session_start();
//   

  	function update_money ($payed_money) {
  		
  		global $bill;
  		
  		$user = $_SESSION["user"];
  		$sql2 = "SELECT `money` FROM `users`WHERE `username` = \"" . $user . "\"";
  		$result = mysql_query($sql2);
  		$account_money_array = mysql_fetch_array($result);
  		// echo $account_money_array[0] . " " .  $bill;
  		
  		// $account_money = $account_money_array[0] - $bill;
  		// $sql3 = "UPDATE `users` SET `money`=" . $account_money . " WHERE `username` = \"". $user . "\"";
  		// $result2 = mysql_query($sql3);
  		
  		// put new budget into money field of users-table as new balance
  		$art = "buy";
  		$account_money = balance($bill, $user, $art);
  		
  		echo "<br>" .  $user . " new money is " . $account_money . "$.<br>";
  	}
  	
  	function insert_transaction($s, $m, $b, $price) {
  		
  		
  		global $user;
  		//find out user_id
  		$sql3 = "SELECT `user_id` FROM `users` WHERE `username` = \"" . $user . "\"";
  		$result = mysql_query($sql3);
  		$user_id = mysql_fetch_array($result);
  		
  		
  		$insert_sql = "INSERT INTO `transactions` (`transaction_id` ,`user_id` ,`date` ,`stock` ,`price` ,`amount` ,`sellorbuy` ,`bill`) VALUES (NULL , '$user_id[0]', CURDATE() , '$s', '$price', '$m', 'buy', '$b')";
  		$result = mysql_query($insert_sql);
  	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<title>Order confirmation</title>
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
				Order confirmation
			</h2>
			<?php 
				$user = $_SESSION["user"];
				
				if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
					die("Could not connect to database");
				
				// select database
				if (mysql_select_db(DB, $connection) === FALSE)
					die("Could not select database");
				// echo $user . " bought <br>";
				for ($i = 0; $i < sizeof($_GET); ++$i) {
					// echo "key: ".key($_GET)."<br>value: ".current($_GET)."<br>";
					$stock = key($_GET);
					$menge = current($_GET);
					if ($menge != ""){
						$sql = "SELECT `lasttrade`\n"
				    . "FROM `stocks`\n"
				    . "WHERE `symbol` = \"" . $stock . "\"";
						// $sql = "SELECT \"lasttrade\" from \"stocks\" where \"symbol\" = \"" . $stock . "\"";
						//echo $sql . "<br>";
						$result = mysql_query($sql);
						if ($result === FALSE)
							die("Could not query database");
						$ergebnis = mysql_fetch_array($result);
						$bill = $menge * $ergebnis[0];
						
						echo $user . " ordered " . $menge . " of product id " . $stock . " for ". $bill . "$.<br>";
						insert_transaction($stock, $menge, $bill, $ergebnis[0]);
					
					}
					next($_GET);
				}
				
				update_money ($bill);
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