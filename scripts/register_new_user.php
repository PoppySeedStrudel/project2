<?php

function register_new_user($user, $pass, $mail) {
	
	// connect to database
	if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
		die("Could not connect to database");
	
	// select database
	if (mysql_select_db(DB, $connection) === FALSE)
		die("Could not select database");
	
	// prepare SQL
	
	$user = mysql_real_escape_string($user);
	$pass = mysql_real_escape_string($pass);
	$mail = mysql_real_escape_string($mail);
	
	// check, if the user already exists
	
	$sql1 = sprintf("SELECT 1 FROM `users` WHERE `username` = '$user'");
	$result = mysql_query($sql1);
	if (!$result) {
		$message  = 'Ungültige Abfrage: ' . mysql_error() . "\n";
		$message .= 'Gesamte Abfrage: ' . $sql;
		die($message);
	}
	if (mysql_num_rows($result) != 1)
	{
		$sql = sprintf("INSERT INTO users(user_id, username,password, email, money) VALUES(NULL, '$user', '$pass', '$mail', 10000)");
	 
		// execute query
		$result = mysql_query($sql);
		if ($result === FALSE){
			die("Could not query database");
		}
		return true;
		
	}
	else {
		return false;
	}
	

}