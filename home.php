<?php
  
// enable sessions
session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Log In</title>
  </head>
  <body>

	welcome! </ br>
	
<?php 
	if ($_SESSION["authenticated"] === TRUE){
		echo "true<br>";
		$user = $_SESSION["user"];
		echo $user;
	}
?>
<p>
<a href="welcome.php">login/welcome </a><br><a href="bye.php">logout </a><br><a href="register.php">register</a><br><a href="buy.php">buy</a><br><a href="account.php">account</a>
  </body>
</html>