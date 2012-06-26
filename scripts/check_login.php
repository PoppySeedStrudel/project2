<?php

function check_login() {
	// if username and password were submitted, check them
	if (isset($_POST["user"]) && isset($_POST["pass"]))
	{
		// connect to database
		$user = $_POST["user"];
		if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
			die("Could not connect to database");
	
		// select database
		if (mysql_select_db(DB, $connection) === FALSE)
			die("Could not select database");
	
		// prepare SQL
		$sql = sprintf("SELECT 1 FROM users WHERE username='%s' AND password='%s'",
				mysql_real_escape_string($_POST["user"]),
				mysql_real_escape_string($_POST["pass"]));
	
		// execute query
		$result = mysql_query($sql);
		if ($result === FALSE)
			die("Could not query database");
	
		// check whether we found a row
		if (mysql_num_rows($result) == 1)
		{
			// remember that user's logged in
			$_SESSION["authenticated"] = TRUE;
			$_SESSION["user"] = $user;
	
			// redirect user to home page, using absolute path, per
			// http://us2.php.net/manual/en/function.header.php
			$host = $_SERVER["HTTP_HOST"];
			$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			header("Location: http://$host$path/welcome.php?" . $test);
			exit;
		}
	}
}
?>