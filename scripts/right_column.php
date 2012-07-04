

<?php
/**
 * Script to fill the right column of the Online Stock Market.
 * The script checks if you are logged in or not and display either login/pw-fields or welcomes the username
 * 
 * Author: Cornelius Baier
 * Date: 26.06.2012
 * Version: 0.9
 * 
 * 
 */


	function fill_right_column() {
		if ($_SESSION["authenticated"] != TRUE){
		
			echo "Please Log in here or <a href=\"register.php\">register!</a><br>";
			echo "<p><form action=\"";
			echo $_SERVER["PHP_SELF"];
			echo "\" method=\"post\"><table><tr><td>Username:</td></tr><tr><td>";
			echo "<input name=\"user\" type=\"text\" /></td></tr><tr><td>Password:</td></tr><tr>";
			echo "<td><input name=\"pass\" type=\"password\" /></td></tr><tr>";
			echo "<td><input type=\"submit\" value=\"Log In\" /></td></tr></table></form>";
		
		}
		
		else {
			echo "You are logged in, <br>";
			$user = $_SESSION["user"];
			echo $user .".";
		}
	}
?>