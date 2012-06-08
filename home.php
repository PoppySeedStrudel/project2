<?php
  
	function logout() {
		echo "logout";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Log In</title>
  </head>
  <body>

	welcome! </ br>
	
<?php 
	if ($_SESSION["authenticated"] = TRUE){
		echo "true";
	}
?>

logout:<br></br>
<form action="bye.php"><input type="submit" value="logout"></form>
  </body>
</html>