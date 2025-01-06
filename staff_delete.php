<?php
	include "db_connect.php";
	$sql="DELETE FROM employee where e_id='$_GET[id]'";
	if ($conn->query($sql))
	header("location:staff_view.php");
	else
	echo "error";
?>