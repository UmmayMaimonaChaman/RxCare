<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="navigation.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="file_f3.css">
<title>
Transaction Reports
</title>
<style>
body {font-family:Arial;}
</style>
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
    <h2> TRANSACTION REPORTS</h2>
    </div>
    
    <br><br><br><br><br><br><br><br><br>
    
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <p>
                        <label for="start">Start Date:</label>
                        <input type="date" name="start">
                    </p>
                    <p>
                        <label for="end">End Date:</label>
                        <input type="date" name="end">
                    </p>
                
            <input type="submit" name="submit" value="View Records">
            </form> 
            
<?php
include "db_connect.php";
    if(isset($_POST['submit'])) {
        
        $start=$_POST['start'];
        $end=$_POST['end'];
        $res=mysqli_query($conn,"SELECT SUM(p_amt) AS PAMT FROM purchase WHERE pur_date >= '$start' AND pur_date <= '$end'") or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($res))
        {
            $pamt=$row['PAMT'];
            
        }
        
        $res=mysqli_query($conn,"SELECT SUM(total_amt) AS SAMT FROM sales WHERE s_date >= '$start' AND s_date <= '$end'") or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($res))
        {
            $samt=$row['SAMT'];
            
        } 
        
        $profit = $samt - $pamt;
        $profits = number_format($profit, 2);
?>
        
        <table align="right" id="table1" style="margin-right:100px;">
            <tr>
                <th>Purchase ID</th>
                <th>Medicine ID</th>                
                <th>Quantity</th>
                <th>Date of Purchase</th>
                <th>Cost of Purchase(in TAKA)</th>
            </tr>
    <?php
    $sql = "SELECT p_id,med_id,p_qty,p_amt,pur_date FROM purchase 
            WHERE pur_date >= '$start' AND pur_date <= '$end';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            
        echo "<tr>";
            echo "<td>" . $row["p_id"]. "</td>";
            echo "<td>" . $row["med_id"]. "</td>";
            echo "<td>" . $row["p_qty"]. "</td>";
            echo "<td>" . $row["pur_date"]. "</td>";
            echo "<td>" . $row["p_amt"]. "</td>";
            
        echo "</tr>";
        }
    }
    
    echo "<tr>";
    echo "<td colspan=4>Total</td>";
    echo"<td >TAKA: ".$pamt."</td>";
    echo "</tr>";
    echo "</table>";
    echo "</table>";
    ?>  
    
    <table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Sale ID</th>
            <th>Customer ID</th>
            <th>Employee ID</th>
            <th>Date</th>
            <th>Sale Amount(in taka)</th>
        </tr>
    
    <?php
    include "db_connect.php";
    $sql = "SELECT sale_id, c_id,s_date,s_time,total_amt,e_id FROM sales
            WHERE s_date >= '$start' AND s_date <= '$end';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    
        while($row = $result->fetch_assoc()) {
            
            
        echo "<tr>";
            echo "<td>" . $row["sale_id"]. "</td>";
            echo "<td>" . $row["c_id"] . "</td>";
            echo "<td>" . $row["e_id"]. "</td>";
            echo "<td>" . $row["s_date"]."</td>";
            echo "<td>" . $row["total_amt"]. "</td>";
            
        echo "</tr>";
        }
    echo "<tr>";
    echo "<td colspan=4>Total</td>";
    echo"<td >Taka: ".$samt."</td>";
    echo "</tr>";
    echo "</table>";
    }
    ?>
    
    <table align="right" id="table1" style="margin-bottom:100px;margin-right:100px;">
    <tr style="background-color: #f2f2f2;" >
        <td>Transaction Amount </td>
                <td>Taka: <?php echo $profits; }?></td>
    </tr>
    </table>
                    
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

