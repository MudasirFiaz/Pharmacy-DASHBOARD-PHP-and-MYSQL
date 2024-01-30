
<?php 
session_start();
include("config.php");

if (isset($_POST['add-med'])) {  
    $med_name = $_POST['name'];
    $med_mfg = $_POST['menufecture'];
    $med_exp = $_POST['expiry'];
    $med_supplier = $_POST['supplier'];
    $med_price = $_POST['price'];
    $image= $_FILES['image'];
    $med_quantity = $_POST['quantity'];
   

        $img_name = $_FILES['image']['name'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];
        $img_type = $_FILES['image']['type'];

        $img_dir = "uploads/" . $med_name . $img_name;

        move_uploaded_file($img_tmp_name, $img_dir);

        $qry = "INSERT INTO medicine(`med_name`, `med_mfg`, `med_exp`, `med_supplier`, `med_price`, `med_img`, `med_quantity`) 
                VALUES ('$med_name', '$med_mfg', '$med_exp', '$med_supplier', '$med_price', '$img_dir','$med_quantity')";

        $result=mysqli_query($cn,$qry);
        if($result){
            $_SESSION['status'] = "Data has been Inserted!";
            header("Location:add-Medicine.php");
        } 
}



?>     
