<?php 
session_start();
include("config.php");

if (isset($_POST['add-customer'])) {  
    $cus_name = $_POST['name'];
    $cus_mobile = $_POST['mobile'];
    $cus_cnic = $_POST['cnic'];
    $cus_date = $_POST['date'];

        $qry = "INSERT INTO customers(`cus_name`, `cus_mobile`, `cus_cnic`, `cus_date`) 
                VALUES ('$cus_name', '$cus_mobile', '$cus_cnic', '$cus_date')";

        $result=mysqli_query($cn,$qry);
        if($result){
            $_SESSION['status'] = "Data has been Inserted!";
            header("Location:add-customer.php");
        } 
}



?>     