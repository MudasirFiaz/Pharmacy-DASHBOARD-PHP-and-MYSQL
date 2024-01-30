<?php
session_start();
include("config.php");
$get_id = $_GET['id'];
$delete_query = "DELETE FROM admin WHERE id = $get_id";

if (mysqli_query($cn, $delete_query)) {
    $_SESSION['delete'] = "Data has been Deleted!";
    header("Location:logout.php");
} else {
    echo "Error: " . mysqli_error($cn);
}

// Don't forget to close the database connection
mysqli_close($cn);
?>