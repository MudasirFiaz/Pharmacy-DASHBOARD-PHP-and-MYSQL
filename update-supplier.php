<?php  
include("config.php"); 
if(isset($_POST["update-supplier"])){
    $supplier_id = $_POST['id'];
    $supplier_name = $_POST['name'];
    $supplier_mobile = $_POST['mobile'];
    $supplier_cnic = $_POST['cnic'];
    $supplier_address = $_POST['address'];

    $update_query = mysqli_query($cn, "UPDATE supplier SET
    sup_name='$supplier_name',
    sup_mobile='$supplier_mobile',
    sup_cnic='$supplier_cnic',
    sup_address='$supplier_address'
    WHERE id=$supplier_id");

    if ($update_query) {
        header("Location: supplier.php");
    } else {
        $_SESSION['status'] = "Data has been Updated!";
        echo mysqli_error($cn);
    }
}
?>
