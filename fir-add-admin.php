
<?php
session_start();
include("config.php");

if(mysqli_connect_error()){
 echo "Error connecting to database";
}

if (isset($_POST['add-admin'])) {
    
    $admin_name = $_POST['name'];
    $admin_fathername = $_POST['fname'];
    $admin_password = $_POST['password'];
    $admin_cnic = $_POST['cnic'];
    $admin_mobile = $_POST['mobile'];
    $admin_birth = $_POST['birth'];
    $admin_address = $_POST['address'];
    $admin_image = $_FILES['image'];
    $role = $_POST['role'];


        $img_name = $_FILES['image']['name'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];
        $img_type = $_FILES['image']['type'];

        $img_dir = "uploads/" . $admin_name . $img_name;

        move_uploaded_file($img_tmp_name, $img_dir);

        $sql = "INSERT INTO admin (`name`, `fname`, `password`,`cnic`, `mobile`, `birth`, `address`, `image`, `role`) 
                VALUES ('$admin_name', '$admin_fathername', '$admin_password', '$admin_cnic', '$admin_mobile', '$admin_birth', '$admin_address', '$img_dir', '$role')";

        $result = mysqli_query($cn, $sql);
        if ($result){
            header("Location: Admin.php");
        } 
}



?>     


