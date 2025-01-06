<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="file_f4.css">
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
	<h2> ADD PURCHASE DETAILS</h2>
	</div>
	</center>
	
	
	<br><br><br><br><br><br><br><br>
	
	
	<div class="one row">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				
	<?php
	
		include "db_connect.php";
		 
		if(isset($_POST['add']))
		{
		$pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);
		$mid = mysqli_real_escape_string($conn, $_REQUEST['mid']);
		$qty = mysqli_real_escape_string($conn, $_REQUEST['pqty']);
		$cost = mysqli_real_escape_string($conn, $_REQUEST['pcost']);

		$sql = "INSERT INTO purchase VALUES ($pid, $mid,'$qty','$cost')";
		if(mysqli_query($conn, $sql)){
			echo "<p style='font-size:8;'>Purchase details successfully added!</p>";
		} else{
			echo "<p style='font-size:8;color:red;'>Error! Check Transaction details properly.</p>";
		}
		
		}
		 
		$conn->close();
	?>
	
			<div class="column">
					<p>
						<label for="pid">Purchase ID:</label><br>
						<input type="number" name="pid">
					</p>
					<p>
						<label for="mid">Medicine ID:</label><br>
						<input type="number" name="mid">
					</p>
					<p>
						<label for="pqty">Purchase Quantity:</label><br>
						<input type="number" name="pqty">
					</p>
					
					
				</div>
				<div class="column">
					
					<p>
						<label for="pcost">Purchase Cost:</label><br>
						<input type="number" step="0.01" name="pcost">
					</p>
					
				</div>
				
			
			<input type="submit" name="add" value="Add Purchase">
			</form>
		<br>
	
	</div>
		
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