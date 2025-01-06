
<?php
    include "db_connect.php";

    if (isset($_GET['id'])) {
        $med_id = $_GET['id'];
        $conn->begin_transaction();

        try {
            $stmt = $conn->prepare("DELETE FROM purchase WHERE MED_ID = ?");
            $stmt->bind_param("s", $med_id);
            if (!$stmt->execute()) {
                throw new Exception("Error deleting from purchase table: " . $stmt->error);
            }
            $stmt->close();

            $stmt = $conn->prepare("DELETE FROM meds WHERE med_id = ?");
            $stmt->bind_param("s", $med_id);
            if (!$stmt->execute()) {
                throw new Exception("Error deleting from meds table: " . $stmt->error);
            }
            $stmt->close();
            $conn->commit();
            header("Location: materials_view.php");
            exit();
        } catch (Exception $e) {
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }

        $conn->close();
    } else {
        echo "No medication ID provided.";
    }
?>
