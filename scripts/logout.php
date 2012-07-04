<?php
/**
 * script to delete the session cookie and log out the user.
 * author: cornelius baier
 * date: 03.07.2012
 * version: 0.9
 * 
 */

	function logout(){
		
		$_SESSION["authenticated"] = FALSE;
		session_destroy();
			
		
	}
	
?>
