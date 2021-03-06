<?php
 
	// enable sessions
	session_start();
	// get MySQL login data
    require "scripts/common.php";
   
    //check login
    require "scripts/check_login.php";
    check_login();
    
    require "scripts/register_new_user.php";
    $a = 1;
	$b = 1;
    // if username and password were submitted, check them
   if (isset($_POST["user"]) && isset($_POST["pass"]))
    {
		
    	$user = $_POST["user"];
    	if (register_new_user($_POST["user"], $_POST["pass"], $_POST["mail"]) != TRUE){
			
    		$b = 0;
    		
    	}
 		else {
	    	$_SESSION["authenticated"] = TRUE;
			$_SESSION["user"] = $user;
 		}
		
    }
    // php for right column
    require "scripts/right_column.php";
    
    //check user who is registering for possible usernames
    require 'scripts/validate_user_data.php';
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css" />
<title>Register here</title>
  <script type="text/javascript">
    // <![CDATA[

        function validate()
        {
            with (document.forms.registration)
            {
                if (user.value == "")
                {
                    alert("You must provide username.");
                    return false;
                }
                else if (pass.value == "")
                {
                    alert("You must provide a password.");
                    return false;
                }
                return true;
            }
        }

    // ]]>
    </script>
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
		<?php 
			global $a;
		
		  if ($_SESSION["authenticated"] != TRUE && $a != 0){
		  	
		  	if ($b != 1){
		  		echo "<h2>Username already has been taken!</h2><br>Please chose a different username...";
		  	}
		  	
		   	echo "<h2> Please enter your data:</h2>";
		  	echo "<form action=\"";
		  	echo $_SERVER["PHP_SELF"];
		  	echo "\" method=\"post\" name=\"registration\" onsubmit=\"return validate();\">";
		  	echo "<table><tr><td>Username:</td> <td><input name=\"user\" type=\"text\" /></td>";
		  	echo "</tr><tr><td>Password:</td><td><input name=\"pass\" type=\"password\" /></td>";
		  	echo "</tr><tr><td>E-Mail:</td><td><input name=\"mail\" type=\"mail\" /></td>";
		  	echo "</tr><tr><td></td><td><input type=\"submit\" value=\"Log In\" /></td>";
		  	echo "</tr></table></form>";
		  	
		  }
		  else {
		  	echo "You are now registered and logged in.";
		  }
	
?>

		</div>
		<div id="aside">
		<?php 
		if ($_SESSION["authenticated"] != TRUE){
			echo "Please register on the left side!";
		}
		else {
			fill_right_column();
		}
		 ?>
		</div>
		<div id="footer">
			Copyright © Cornelius Baier, Online Stock-Market, 2012
		</div>
	</div>
</div>

</body>
</html>
