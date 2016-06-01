<?php
	//echo phpinfo();
	//$con = new mysqli('localhost','root','','beerstoredb');
	$home = getenv('HOME');
	include "$home/etc/db-connect.php";
	$con->select_db('beerstoredb');
?>
