<?php  include("config.php"); ?>

<?php


if(isset($_POST["update-med"])){
    $med_id = $_POST['id']; // Assuming you have an input field with the name 'id' in your form
    $med_name = $_POST['name'];
    $med_mfg = $_POST['menufecture'];
    $med_exp = $_POST['expiry'];
    $med_supplier = $_POST['supplier'];
    $med_price = $_POST['price'];

    // Check if 'image' key exists in $_FILES array
    if (isset($_FILES['image'])) {
        $img_name = $_FILES['image']['name'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $img_dir = "uploads/" . $med_name;

        move_uploaded_file($img_tmp_name, $img_dir);
        
        // Update the image field in the database
        $update_image_query = mysqli_query($cn, "UPDATE medicine SET med_img='$img_dir' WHERE id=$med_id");
        
        if (!$update_image_query) {
            echo mysqli_error($cn);
        }
    }

    $update_query = mysqli_query($cn, "UPDATE medicine SET
    med_name='$med_name',
    med_mfg='$med_mfg',
    med_exp='$med_exp',
    med_supplier='$med_supplier',
    med_price='$med_price',
    med_quantity='{$_POST['quantity']}'
    WHERE id=$med_id");

    if ($update_query) {
        header("Location: view.php");
    } else {
        echo mysqli_error($cn);
    }
}
?>

