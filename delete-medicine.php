


<?php
session_start();
include("config.php");
$get_medicine_id = $_GET['id'];
$delete_med_query = "DELETE FROM medicine WHERE id = $get_medicine_id";

if (mysqli_query($cn, $delete_med_query)) {
    $_SESSION['status'] = "Data has been Deleted!";
    header("Location:view.php");
} else {
    echo "Error: " . mysqli_error($cn);
}

// Don't forget to close the database connection
mysqli_close($cn);
?>


