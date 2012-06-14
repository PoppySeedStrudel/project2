<?php

// get MySQL login data
require "common.php";

// enable sessions
//session_start();

// download the csv-file from yahoo
$handle = fopen("http://download.finance.yahoo.com/d/quotes.csv?s=GOOG+AMZN+AAPL+EBAY+MSFT+INTC+FB+GRPN&f=sl1d1t1n&e=.csv", "r");

// delete data in database

$delete_database = "DELETE FROM stocks";
$delete_data = mysql_query($delete_database);
if ($delete_data === FALSE)
	die("Could not query database");

// go thru the csv-file as an array and write each row into the database

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//	echo "Symbol: ".$data[0]."<br>Last Trade: ".$data[1]."<br>Date: ".$data[2]."<br>Time: ".$data[3]."<br>Name: " . $data[4] . "<p>";
	$sql = sprintf("INSERT INTO stocks (stock_id, symbol, name, lasttrade, date, time) VALUES (NULL, '$data[0]', '$data[4]', '$data[1]', CURDATE(), CURTIME())");
	$result = mysql_query($sql);
	if ($result === FALSE)
		die("Could not query database");
}

?>
