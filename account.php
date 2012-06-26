<?php

	// enable sessions
	session_start();

    // get MySQL login data
    require "scripts/common.php";

    require "scripts/balance.php";
    // php for right column
    require "scripts/right_column.php";
    //check login
    require "scripts/check_login.php";
    check_login();
    

    
    $gesamt = 0;

    //extract the data for the user who is logged in from the transactions-table
    
	function getdata() {

		global $gesamt;
		
		// find out user_id for the use in sql against transaction-table
		$user = $_SESSION["user"];
		$sql = "SELECT `user_id` FROM `users` WHERE `username` = \"" . $user . "\"";
		$result = mysql_query($sql);
		$user_id_array = mysql_fetch_array($result);
		$user_id = $user_id_array[0];
		
		// set up query to extract all data from transactions with the user-id of the current user
		
		$sql = "SELECT `stock`,`amount`,`bill` FROM `transactions` WHERE `user_id` = '$user_id' order by `stock`";
		
		$result = mysql_query($sql);
		
			if (!$result) {
				$message  = 'Ungültige Abfrage 1: ' . mysql_error() . "\n";
				$message .= 'Gesamte Abfrage: ' . $sql;
				die($message);
			}
			
		$stockname = "";
		
		echo $user . " has the following stocks in his portfolio: <br>";
		// go thru the data of the user
		while ($row = mysql_fetch_assoc($result)) {
			
			// if the stock is not list echoed out on the account page, sum up all the transactions and echo it out
			if ($stockname != $row['stock']){
				// find out the number of stocks for this stock
				$summe_menge = get_sum_amount($row['stock'], $user_id);
				// find out the money spent for this particular stock		
				$sum_bill = get_sum_bill($row['stock'], $user_id);
				// echo it out
				echo $row['stock'] . " " . $summe_menge . " " . $sum_bill . "<br>";
				$stockname = $row['stock'];	
			}
			
		}
		
		echo "The user spent " .  $gesamt . " $.<br>";
		$money = balance(0,$user, 'null');
		echo "His current balance is " . $money . "$.<br>";
		
	}	
		
	// get sum of a certain stock for the user from the transaction table
		
	function get_sum_amount($s, $u){
		

		$sql = "SELECT SUM(amount) as \"total amount\" FROM transactions WHERE user_id = '$u' AND stock = '$s'";
		
		$result = mysql_query($sql);
		
			if (!$result) {
				$message  = 'Ungültige Abfrage 2: ' . mysql_error() . "\n";
				$message .= 'Gesamte Abfrage: ' . $sql;
				die($message);
			}
		
		$summe_menge = mysql_fetch_array($result);
		
		return $summe_menge[0];
	}
		
	function get_sum_bill($s, $u){
		
		global $gesamt;
		
		$sql = "SELECT SUM(bill) as \"total amount\" FROM transactions WHERE user_id = '$u' AND stock = '$s'";
		
		$result = mysql_query($sql);
			
			if (!$result) {
				$message  = 'Ungültige Abfrage 3: ' . mysql_error() . "\n";
				$message .= 'Gesamte Abfrage: ' . $sql;
				die($message);
			}
		
		$sum_bill = mysql_fetch_array($result);
		$gesamt = $gesamt + $sum_bill[0];
		return $sum_bill[0];
		
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<title>Account Info</title>
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
				Account Info
			</h2>
			<?php 
				getdata();
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