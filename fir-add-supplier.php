<?php 
session_start();
include("config.php");

if (isset($_POST['add-sup'])) {  
    $supplier_name = $_POST['name'];
    $supplier_mobile = $_POST['mobile'];
    $supplier_cnic = $_POST['cnic'];
    $supplier_address = $_POST['address'];
   

        $qry = "INSERT INTO supplier(`sup_name`, `sup_mobile`, `sup_cnic`, `sup_address`) 
                VALUES('$supplier_name', '$supplier_mobile', '$supplier_cnic', '$supplier_address')";

        $result=mysqli_query($cn,$qry);
        if($result){
            $_SESSION['status'] = "Data has been Inserted!";
            header("Location:supplier.php");
        }
}



?>