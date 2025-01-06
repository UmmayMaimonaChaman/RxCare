<?php
	include "db_connect.php";
	$sql="DELETE FROM customer where c_id='$_GET[id]'";
	if ($conn->query($sql))
	header("location:customer_view.php");
	else
	echo "error";
?>