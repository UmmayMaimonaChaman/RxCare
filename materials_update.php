

<?php
    include "db_connect.php";

    // Initialize $row with default empty values
    $row = array('', '', '', '', '', '');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $qry1 = "SELECT * FROM meds WHERE med_id='$id'";
        $result = $conn->query($qry1);

        // Check if the query is successful and the result has rows
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_row();
        } else {
            echo "<p style='color:red; text-align:center;'>Error: Medicine not found or query failed.</p>";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <link rel="stylesheet" type="text/css" href="file_f4.css">
    <title>Medicines</title>
</head>

<body>
    <div class="sidenav">
        <h2 style="font-family:Arial; color:white; text-align:center;"> RxCare </h2>
        <a href="adminmain.php">Dashboard</a>
        <button class="dropdown-btn">Materials<i class="down"></i></button>
        <div class="dropdown-container">
            <a href="materials_add.php">Add New Medicine</a>
            <a href="materials_view.php">Manage Materials</a>
        </div>
        <button class="dropdown-btn">Transaction<i class="down"></i></button>
        <div class="dropdown-container">
            <a href="transaction_add.php">Add New Transaction</a>
            <a href="transaction_view.php">Manage Transaction</a>
        </div>
        <button class="dropdown-btn">Staffs<i class="down"></i></button>
        <div class="dropdown-container">
            <a href="staff_add.php">Add New Staffs</a>
            <a href="staff_view.php">Manage Staffs</a>
        </div>
        <button class="dropdown-btn">Customers<i class="down"></i></button>
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
            <h2> UPDATE MEDICINE DETAILS </h2>
        </div>
    </center>

    <div class="one">
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="column">
                    <p>
                        <label for="medid">Medicine ID:</label><br>
                        <input type="number" name="medid" value="<?php echo htmlspecialchars($row[0]); ?>" readonly>
                    </p>
                    <p>
                        <label for="medname">Medicine Name:</label><br>
                        <input type="text" name="medname" value="<?php echo htmlspecialchars($row[1]); ?>">
                    </p>
                    <p>
                        <label for="qty">Quantity:</label><br>
                        <input type="number" name="qty" value="<?php echo htmlspecialchars($row[2]); ?>">
                    </p>
                    <p>
                        <label for="cat">Category:</label><br>
                        <input type="text" name="cat" value="<?php echo htmlspecialchars($row[3]); ?>">
                    </p>
                </div>
                
                <div class="column">
                    <p>
                        <label for="sp">Price:</label><br>
                        <input type="number" step="0.01" name="sp" value="<?php echo htmlspecialchars($row[4]); ?>">
                    </p>
                    <p>
                        <label for="loc">Location:</label><br>
                        <input type="text" name="loc" value="<?php echo htmlspecialchars($row[5]); ?>">
                    </p>
                </div>
        
                <input type="submit" name="update" value="Update">
            </form>

            <?php
                if (isset($_POST['update'])) {
                    // Sanitize input to prevent SQL injection
                    $id = mysqli_real_escape_string($conn, $_POST['medid']);
                    $name = mysqli_real_escape_string($conn, $_POST['medname']);
                    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
                    $cat = mysqli_real_escape_string($conn, $_POST['cat']);
                    $price = mysqli_real_escape_string($conn, $_POST['sp']);
                    $lcn = mysqli_real_escape_string($conn, $_POST['loc']);

                    $sql = "UPDATE meds SET med_name='$name', med_qty='$qty', category='$cat', med_price='$price', location_rack='$lcn' WHERE med_id='$id'";

                    if ($conn->query($sql)) {
                        header("Location:materials_view.php");
                        exit;
                    } else {
                        echo "<p style='color:red; text-align:center;'>Error! Unable to update the details.</p>";
                    }
                }
            ?>
        </div>
    </div>
</body>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    for (var i = 0; i < dropdown.length; i++) {
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
