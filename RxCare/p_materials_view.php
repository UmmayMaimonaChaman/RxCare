<?php

	include "db_connect.php";
	
	if(isset($_POST['search'])) {
		
		$search=$_POST['valuetosearch'];
		$search_result=mysqli_query($conn,"SET @p0='$search';")or die(mysqli_error($conn));
		$search_result=mysqli_query($conn,"CALL `SEARCH_INVENTORY`(@p0);") or die(mysqli_error($conn));
	}
	else {
			$query="SELECT med_id as medid, med_name as medname,med_qty as medqty,category as medcategory,med_price as medprice,location_rack as medlocation FROM meds";
			$search_result=filtertable($query);
	}
	
	function filtertable($query)
	{	$conn = mysqli_connect("localhost", "root", "", "RxCare_pharmacy");
		$filter_result=mysqli_query($conn,$query);
		return $filter_result;
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="file_f2.css">
<title>
Materials
</title>
</head>

<body>

		<div class="sidenav">
			<h2 style="font-family:Arial; color:white; text-align:center;"> RxCare </h2>
			<a href="pharmamain.php">Dashboard</a>
			
			<a href="p_materials_view.php">View Materials</a>
			<a href="p_sale1.php">Add New Sale</a>
			<button class="dropdown-btn">Customers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="p_customer_edit.php">Add New Customer</a>
				<a href="p_customer_view.php">View Customers</a>
			</div>
	</div>


	<?php
	
	include "db_connect.php";
	session_start();

	$sql1="SELECT E_FNAME from EMPLOYEE WHERE E_ID='$_SESSION[user]'";
	$result1=$conn->query($sql1);
	$row1=$result1->fetch_row();
	
	$ename=$row1[0];
		
	?>

	<div class="topnav">
		<a href="logout_pharma.php">Logout(signed in as Pharmacist)</a>
	</div>

	
	<center>
	
	<div class="head">
	<h2> MEDICINE INVENTORY </h2>
	</div>
	
	<form method="post">
	<input type="text" name="valuetosearch" placeholder="Enter any value to Search" style="width:400px; margin-left:250px;">&nbsp;&nbsp;&nbsp;
	<input type="submit" name="search" value="Search">
	<br><br>
	</form>
	
	</center>
	

	<table align="right" id="table1" style="margin-top:20px; margin-right:100px;">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity Available</th>
			<th>Category</th>
			<th>Price</th>
			<th>Location in Store</th>
		</tr>
		
	<?php
	
		if ($search_result->num_rows > 0) {
		
		while($row = $search_result->fetch_assoc()) {

		echo "<tr>";
			echo "<td>" . $row["medid"]. "</td>";
			echo "<td>" . $row["medname"] . "</td>";
			echo "<td>" . $row["medqty"]. "</td>";
			echo "<td>" . $row["medcategory"]. "</td>";
			echo "<td>" . $row["medprice"] . "</td>";
			echo "<td>" . $row["medlocation"]. "</td>";
		echo "</tr>";
		}
		echo "</table>";
		} 
		
		$conn->close();
	?>
	
</body>

<script>
	
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
			  this.classList.toggle("active");
			  var dropdownContent = this.nextElementSibling;
			  if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			  } else {
			  dropdownContent.style.display = "block";
			  }
			  });
			}
			
</script>

</html>