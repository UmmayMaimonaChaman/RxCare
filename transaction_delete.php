<?php
	include "db_connect.php";
	$pid=$_GET['pid'];
	$mid=$_GET['mid'];
				
	$sql="DELETE FROM purchase where p_id='$pid' and med_id='$mid'";

	if ($conn->query($sql))
	header("location:transaction_view.php");
	else
	echo "error";
?>