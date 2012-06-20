<?php
 

    // get MySQL login data
    require "common.php";

    // enable sessions
    session_start();

    //extract the data for the user who is logged in from the transactions-table
    
	function getdata() {

		$user = $_SESSION["user"];
		$sql = "SELECT `user_id` FROM `users` WHERE `username` = \"" . $user . "\"";
		$result = mysql_query($sql);
		$user_id_array = mysql_fetch_array($result);
		$user_id = $user_id_array[0];
		
		
		// $sql = "SELECT `stock`,`amount`, `bill` FROM `transactions` WHERE 'user_id = $user_id";
		$sql = "SELECT `stock`,`amount`,`bill` FROM `transactions` WHERE `user_id` = '$user_id' order by `stock`";
		
		$result = mysql_query($sql);
		
		if (!$result) {
			$message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
			$message .= 'Gesamte Abfrage: ' . $sql;
			die($message);
		}
		$stockname = "";
		
		while ($row = mysql_fetch_assoc($result)) {
			// echo $row['stock'] . " ";
			// echo $row['amount']. " ";
			// echo $row['bill']. "<br>";
			if ($stockname != $row['stock']){
				$summe_menge = get_sum_amount($row['stock']);
				// $sum_bill = get_sum_bill($row['stock']);
				echo $row['stock'] . " " . $summe_menge . " " . $sum_bill . "<br>";
				$stockname = $row['stock'];	
			}
			
		}
		
	}	
		
	// get sum of a certain stock for the user from the transaction table
		
	function get_sum_amount($s){
		
		global $user_id;
		
		// $sql = "SELECT SUM(amount) as \"total amount\" FROM transactions WHERE user_id = '$user_id' AND stock = '$s'";
		$sql = "SELECT SUM(amount) as \"total amount\" FROM transactions WHERE user_id = \'5\' AND stock = \'AAPL\'";
		$result = mysql_query($sql);
		
		if (!$result) {
			$message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
			$message .= 'Gesamte Abfrage: ' . $sql;
			die($message);
		}
		
		$summe_menge = mysql_fetch_array($result);
		echo $summe_menge[0];
		return $summe_menge[0];
	}
		
	function get_sum_bill($s){
		
		global $user_id;
		
		// $sql = "SELECT SUM(bill) as \"total amount\" FROM transactions WHERE user_id = '$user_id' AND stock = '$s'";
		$sql = "SELECT SUM(amount) as \"total amount\" FROM transactions WHERE user_id = \'5\' AND stock = \'AAPL\'";
		$result = mysql_query($sql);
		
		if (!$result) {
			$message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
			$message .= 'Gesamte Abfrage: ' . $sql;
			die($message);
		}
		
		$sum_bill = mysql_fetch_array($result);
		return $sum_bill[0];
		
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Account</title>
  </head>
  <body>
<?php 
	getdata();
?>
<p>
<a href="welcome.php">login/welcome </a><br><a href="bye.php">logout </a><br><a href="register.php">register</a><br><a href="buy.php">buy</a><br><a href="account.php">account</a>
  </body>
</html>