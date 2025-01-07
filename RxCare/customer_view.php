<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<title>
Customers
</title>
</head>

<body>

		<div class="sidenav">
			<h2 style="font-family:Arial; color:white; text-align:center;"> RxCare </h2>
			<a href="adminmain.php">Dashboard</a>
			<button class="dropdown-btn">Materials
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="materials_add.php">Add New Medicine</a>
				<a href="materials_view.php">Manage Materials</a>
			</div>
			<button class="dropdown-btn">Transaction
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="transaction_add.php">Add New Transaction</a>
				<a href="transaction_view.php">Manage Transaction</a>
			</div>		
			<button class="dropdown-btn">Staffs
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="staff_add.php">Add New Staffs</a>
				<a href="staff_view.php">Manage Staffs</a>
			</div>			
			<button class="dropdown-btn">Customers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="customer_add.php">Add New Customer</a>
				<a href="customer_view.php">Manage Customers</a>
			</div>
			<a href="sales_view.php">View Sales Invoice Details</a>
			<a href="items_view.php">View Sold Products Details</a>
			<a href="new_sale.php">Add New Sale</a>			
			<a href="reports_view.php">Transaction Reports</a>	
	</div>

	<div class="topnav">
		<a href="logout_page.php">Logout</a>
	</div>
	
	<center>
	<div class="head">
	<h2> CUSTOMERS LIST </h2>
	</div>
	</center>

	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Customer ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Action</th>
		</tr>
	<?php
	
	include "db_connect.php";
	$sql = "SELECT c_id,c_fname,c_lname,c_age,c_sex,c_phno,c_mail FROM customer";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {

		echo "<tr>";
			echo "<td>" . $row["c_id"]. "</td>";
			echo "<td>" . $row["c_fname"] . "</td>";
			echo "<td>" . $row["c_lname"]. "</td>";
			echo "<td>" . $row["c_age"]. "</td>";
			echo "<td>" . $row["c_sex"] . "</td>";
			echo "<td>" . $row["c_phno"]. "</td>";
			echo "<td>" . $row["c_mail"]. "</td>";
			echo "<td align=center>";
				echo "<a class='button1 edit-btn' href=customer_update.php?id=".$row['c_id'].">Edit</a>";
				echo "<a class='button1 del-btn' href=customer_delete.php?id=".$row['c_id'].">Delete</a>";
			echo "</td>";
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
