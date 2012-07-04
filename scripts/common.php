<?php
/**
 * function to connect to the mysql-database
 * 
 */
    
    // display errors
    ini_set("display_errors", true);
    error_reporting(E_ALL ^ E_NOTICE);

    // requirements
    require_once("constants.php");

    // connect to database server
    if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
        apologize("Could not connect to database server (" . HOST . ").");
 

    // select database
    if (mysql_select_db(DB, $connection) === FALSE)
        apologize("Could not select database (" . DB . ").");


?>
