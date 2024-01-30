<?php  
include("config.php"); 

if(isset($_POST["update-customer"])){
    $cus_id = $_POST['id'];
    $cus_name = $_POST['name'];
    $cus_mobile = $_POST['mobile'];
    $cus_cnic = $_POST['cnic'];
    $cus_date = $_POST['date'];

    $update_query = mysqli_query($cn, "UPDATE customers SET
    cus_name='$cus_name',
    cus_mobile='$cus_mobile',
    cus_cnic='$cus_cnic',
    cus_date='$cus_date'
    WHERE id=$cus_id");

    if ($update_query) {
        header("Location: view-customer.php");
    } else {
        $_SESSION['status'] = "Data has been Updated!";
        echo mysqli_error($cn);
    }
}
?>
