<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<title>
Purchases
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
	<h2> STOCK PURCHASE LIST</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Purchase ID</th>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Cost of Purchase</th>
			<th>Action</th>
		</tr>
		
	<?php

	include "db_connect.php";
	$sql = "SELECT p_id,med_id,p_qty,p_cost FROM purchase";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
		
		$sql1="SELECT med_name from meds where med_id=".$row["med_id"]."";
		$result1 = $conn->query($sql1);
		
		while($row1 = $result1->fetch_assoc()) {

			echo "<tr>";
				echo "<td>" . $row["p_id"]. "</td>";
				echo "<td>" . $row["med_id"]. "</td>";
				echo "<td>" . $row1["med_name"] . "</td>";
				echo "<td>" . $row["p_qty"]. "</td>";
				echo "<td>" . $row["p_cost"]. "</td>";
				echo "<td align=center>";		 
				echo "<a class='button1 edit-btn' href=transaction_update.php?pid=".$row['p_id']."&sid="."&mid=".$row['med_id'].">Edit</a>";
				echo "<a class='button1 del-btn' href=transaction_delete.php?pid=".$row['p_id']."&sid="."&mid=".$row['med_id'].">Delete</a>";
				echo "</td>";
			echo "</tr>";
		}
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