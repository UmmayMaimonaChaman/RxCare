
<?php
session_start();
include "db_connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <link rel="stylesheet" type="text/css" href="file_f3.css">
    <link rel="stylesheet" type="text/css" href="table2.css">
    <title>New Sales</title>
</head>

<body>
    <div class="sidenav">
        <h2 style="font-family:Arial; color:white; text-align:center;">RxCare</h2>
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
            <h2>POINT OF SALE</h2>
        </div>
    </center>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <center>
            <select id="cid" name="cid">
                <option value="0" selected="selected">*Select Customer ID (only once for a customer's sales)</option>
                <?php
                $qry = "SELECT c_id FROM customer";
                $result = $conn->query($qry);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option>" . $row["c_id"] . "</option>";
                    }
                }
                ?>
            </select>
            &nbsp;&nbsp;
            <input type="submit" name="custadd" value="Add to Proceed.">
        </center>
    </form>

    <?php
    if (isset($_POST['custadd']) && isset($_POST['cid']) && $_POST['cid'] != "0") {
        $cid = $_POST['cid'];
        $qry1 = "SELECT id FROM admin WHERE a_username='" . $_SESSION['user'] . "'";
        $result1 = $conn->query($qry1);
        $row1 = $result1->fetch_row();
        $eid = $row1[0];

        $qry2 = "INSERT INTO sales (c_id, e_id) VALUES ('$cid', '$eid')";
        if (!$conn->query($qry2)) {
            echo "<p style='font-size:8; color:red;'>Invalid! Enter valid Customer ID to record Sales.</p>";
        }
    }
    ?>

    <form method="post">
        <center>
            <select id="med" name="med">
                <option value="0" selected="selected">Select Medicine</option>
                <?php
                $qry3 = "SELECT med_name FROM meds";
                $result3 = $conn->query($qry3);
                if ($result3->num_rows > 0) {
                    while ($row4 = $result3->fetch_assoc()) {
                        echo "<option>" . $row4["med_name"] . "</option>";
                    }
                }
                ?>
            </select>
            &nbsp;&nbsp;
            <input type="submit" name="search" value="Search">
        </center>
    </form>

    <?php
    if (isset($_POST['search']) && !empty($_POST['med'])) {
        $med = $_POST['med'];
        $qry4 = "SELECT * FROM meds WHERE med_name='$med'";
        $result4 = $conn->query($qry4);
        if ($result4) {
            $row4 = $result4->fetch_row();
        }
    }
    ?>

    <div class="one row" style="margin-right:160px;">
        <form method="post">
            <div class="column">
                <label for="medid">Medicine ID:</label>
                <input type="number" name="medid" value="<?php echo $row4[0] ?? ''; ?>" readonly><br><br>

                <label for="mdname">Medicine Name:</label>
                <input type="text" name="mdname" value="<?php echo $row4[1] ?? ''; ?>" readonly><br><br>
            </div>
            <div class="column">
                <label for="mcat">Category:</label>
                <input type="text" name="mcat" value="<?php echo $row4[3] ?? ''; ?>" readonly><br><br>

                <label for="mloc">Location:</label>
                <input type="text" name="mloc" value="<?php echo $row4[5] ?? ''; ?>" readonly><br><br>
            </div>
            <div class="column">
                <label for="mqty">Quantity Available:</label>
                <input type="number" name="mqty" value="<?php echo $row4[2] ?? ''; ?>" readonly><br><br>

                <label for="mprice">Price of One Unit:</label>
                <input type="number" name="mprice" value="<?php echo $row4[4] ?? ''; ?>" readonly><br><br>
            </div>

            <label for="mcqty">Quantity Required:</label>
            <input type="number" name="mcqty">
            &nbsp;&nbsp;&nbsp;
            <input type="submit" name="add" value="Add Medicine">
            &nbsp;&nbsp;&nbsp;

            <?php
            if (isset($_POST['add']) && isset($_POST['medid']) && isset($_POST['mcqty'])) {
                $qry5 = "SELECT sale_id FROM sales ORDER BY sale_id DESC LIMIT 1";
                $result5 = $conn->query($qry5);
                $row5 = $result5->fetch_row();
                $sid = $row5[0];

                $mid = $_POST['medid'];
                $aqty = (int)$_POST['mqty'];
                $qty = (int)$_POST['mcqty'];

                if ($qty > $aqty || $qty == 0) {
                    echo "QUANTITY INVALID!";
                } else {
                    $price = (float)$_POST['mprice'] * $qty;
                    $qry6 = "INSERT INTO sales_items (sale_id, med_id, sale_qty, tot_price) VALUES ($sid, $mid, $qty, $price)";
                    if ($conn->query($qry6)) {
                        echo "<br><br><center><a class='button1 view-btn' href=new_sale2.php?sid=" . $sid . ">View Order</a></center>";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            }
            ?>

            
        </form>
    </div>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        for (var i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
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
</body>

</html>
