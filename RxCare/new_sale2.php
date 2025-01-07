<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="file_f3.css">
<link rel="stylesheet" type="text/css" href="table2.css">
<title>
New Sales
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
	<h2> SALES INVOICE</h2>
	</div>
	</center>

	<table align='right' id='table1'>
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
	
	<?php
	
	include "db_connect.php";
			
		if(isset($_GET['sid'])) {
		$sid=$_GET['sid'];
		}
		
		if(empty($sid))
		{
			$sql ="SHOW TABLE STATUS LIKE 'sales'";

			if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
			}
			$row = $result->fetch_assoc();
			$sid=$row['Auto_increment']-1;
		}
	
		if(!empty($sid)) {
		$qry1 = "SELECT med_id,sale_qty,tot_price FROM sales_items where sale_id=$sid";
		$result1 = $conn->query($qry1);
		$sum=0;

			if ($result1->num_rows > 0) {
	
			while($row1 = $result1->fetch_assoc()) {
		
			$medid=$row1["med_id"];
			$qry2 = "SELECT med_name,med_price FROM meds where med_id=$medid";
			$result2 = $conn->query($qry2);
			$row2=$result2->fetch_row();
			
			echo "<tr>";
				echo "<td>" . $row1["med_id"]. "</td>";
				echo "<td>" . $row2[0] . "</td>";
				echo "<td>" . $row1["sale_qty"]. "</td>";
				echo "<td>" . $row2[1] . "</td>";
				echo "<td>" . $row1["tot_price"]. "</td>";
				echo "<td align=center>";
				echo "<a name='delete' class='button1 del-btn' href=newsale_delete.php?mid=".$row1['med_id']."&slid=".$sid.">Delete</a>";
				echo "</td>";
			echo "</tr>";
			}
			
	echo "</table>";
			}}
	?>
		
		<div class="one" style="background-color:white;">
		<form method=post>
		<a name='new_sale' class='button1 view-btn' href=new_sale.php?sid=".$sid.">Go Back to Sales Page</a> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		
		</form>
		</div>
		
	<?php
		
		if(isset($_POST['custadd'])) {
			
			$res=mysqli_query($conn,"SET @p0=$sid;");
			$res=mysqli_query($conn,"CALL `TOTAL_AMT`(@p0,@p1);") or die(mysqli_error($conn));
			$res=mysqli_query($conn,"SELECT @p1 as TOTAL;");
			
			while($row3=mysqli_fetch_array($res))
			{
				$tot=$row3['TOTAL'];
			}
			
		echo "<table align='right' id='table1'>
			
		<tr style='background-color: #f2f2f2;'>
		<td>Total</td>
		<td>";echo $tot;
		echo "</td>
		</tr>
		</table>";
		}
					
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