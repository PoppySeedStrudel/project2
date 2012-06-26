<?php

	require "common.php";
	
	function balance($b, $u, $art){

		// find out the users balance before this function was called
		
		$sql = "SELECT `money` FROM `users` WHERE `username` = '$u'";
		$result = mysql_query($sql);
			if (!$result) {
				$message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
				$message .= 'Gesamte Abfrage: ' . $sql;
				die($message);
			}
		$money_array = mysql_fetch_array($result);
		$money = $money_array[0];
		
		//subtract or add current transfer to budget
		if ($art == "buy"){
			$money = $money - $b;
		}
		elseif ($art == "sell") {
			$money = $money + $b;
		}
		
		// update budget in users-table
		
		$sql = "UPDATE `users` SET `money`='$money' WHERE `username` = '$u'";
		// echo $sql;
		$result = mysql_query($sql);
			if (!$result) {
				$message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
				$message .= 'Gesamte Abfrage: ' . $sql;
				die($message);
			}
		return $money;
	}
?>
