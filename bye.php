<?php

	 $_SESSION["authenticated"] = FALSE;
	 session_destroy(); 
	 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Log In</title>
  </head>
  <body>

you are logged out.<br />
<?php 
if ($_SESSION["authenticated"] == FALSE){
	echo "false"; 
}
else {echo "true";}
?>
  </body>
</html>