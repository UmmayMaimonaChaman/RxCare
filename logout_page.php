<?php
	include "db_connect.php";
	session_start();
	unset($_SESSION["user"]);
	if(session_destroy()) {
	header("Location:main.php");
	}
?>