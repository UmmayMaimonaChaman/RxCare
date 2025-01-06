<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="file_f4.css">
<title>
Medicines
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
	<h2> ADD MEDICINE DETAILS</h2>
	</div>
	</center>
	
	
	<br><br><br><br><br><br><br><br>
	
	
	<div class="one">
		<div class="row">
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="medid">Medicine ID:</label><br>
						<input type="number" name="medid">
					</p>
					<p>
						<label for="medname">Medicine Name:</label><br>
						<input type="text" name="medname">
					</p>
					<p>
						<label for="qty">Quantity:</label><br>
						<input type="number" name="qty">
					</p>
					<p>
						<label for="cat">Category:</label><br>
						<select id="cat" name="cat">
								<option>Tablet</option>
								<option>Capsule</option>
								<option>Syrup</option>
                                <option>Injection</option>
                                <option>Ointment</option>
                                <option>Suspension</option>
                                <option>Suppository</option>
						</select>
					</p>
					
				</div>
				<div class="column">
					
					<p>
						<label for="sp">Price: </label><br>
						<input type="number" step="0.01" name="sp">
					</p>
					<p>
						<label for="loc">Location:</label><br>
						<input type="text" name="loc">
					</p>
				</div>
				
			
			<input type="submit" name="add" value="Add Medicine">
			</form>
		<br>
		
		
	<?php
	
		include "db_connect.php";
		 
		if(isset($_POST['add']))
		{
		$id = mysqli_real_escape_string($conn, $_REQUEST['medid']);
		$name = mysqli_real_escape_string($conn, $_REQUEST['medname']);
		$qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
		$category = mysqli_real_escape_string($conn, $_REQUEST['cat']);
		$sprice = mysqli_real_escape_string($conn, $_REQUEST['sp']);
		$location = mysqli_real_escape_string($conn, $_REQUEST['loc']);

		 
		$sql = "INSERT INTO meds VALUES ($id, '$name', $qty,'$category',$sprice, '$location')";
		if(mysqli_query($conn, $sql)){
			echo "<p style='font-size:8;'>Medicine details successfully added to the database!!!</p>";
		} else{
			echo "<p style='font-size:8; color:red;'>Error! Check details.</p>";
		}
		}
		 
		$conn->close();
	?>
		</div>
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
