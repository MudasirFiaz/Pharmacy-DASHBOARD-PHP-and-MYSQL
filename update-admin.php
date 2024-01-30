<?php
include("config.php");

$get_id = $_GET['id'];
if(isset($_POST["update-admin"])){
    $admin_name = $_POST['name'];
    $admin_fathername = $_POST['fname'];
    $admin_password = $_POST['password'];
    $admin_mobile = $_POST['mobile'];
    $admin_cnic = $_POST['cnic'];
    $admin_birth = $_POST['birth'];
    $admin_address = $_POST['address'];
    $admin_role = $_POST['role'];

    // Check if 'image' key exists in $_FILES array
    if (isset($_FILES['image'])) {
        $img_name = $_FILES['image']['name'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_dir = "uploads/" . $admin_name;

        move_uploaded_file($img_tmp_name, $img_dir);
        
        // Update the image field in the database
        $update_image_query = mysqli_query($cn, "UPDATE admin SET image='$img_dir' WHERE id='$get_id' ");
        
        if (!$update_image_query) {
            echo mysqli_error($cn);
        }
    }

    $update_query = mysqli_query($cn, "UPDATE admin SET
    name='$admin_name',
    fname='$admin_fathername',
    password='$admin_password',
    mobile='$admin_mobile',
    cnic='$admin_cnic',
    birth='$admin_birth',
    address='$admin_address',
    role='$admin_role'
    WHERE id='$get_id'");

    if ($update_query) {
        header("Location: Admin.php");
    } else {
        echo mysqli_error($cn);
    }
}
?>