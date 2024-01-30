<?php
session_start();
include("config.php");
$get_supplier_id = $_GET['id'];
$delete_supplier_query = "DELETE FROM supplier WHERE id = $get_supplier_id";

if (mysqli_query($cn, $delete_supplier_query)) {
    $_SESSION['delete'] = "Data has been Deleted!";
    header("Location:supplier.php");
} else {
    echo "Error: " . mysqli_error($cn);
}

// Don't forget to close the database connection
mysqli_close($cn);
?>