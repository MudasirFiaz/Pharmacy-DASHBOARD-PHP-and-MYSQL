<?php
session_start();
include("config.php");
$get_customer_id = $_GET['id'];
$delete_query = "DELETE FROM medicine WHERE id = $get_customer_id";

if (mysqli_query($cn, $delete_query)) {
    $_SESSION['status'] = "Data has been Deleted!";
    header("Location:view-customer.php");
} else {
    echo "Error: " . mysqli_error($cn);
}

// Don't forget to close the database connection
mysqli_close($cn);
?>