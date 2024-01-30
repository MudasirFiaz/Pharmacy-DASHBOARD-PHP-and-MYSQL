<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharmacy</title>
    <?php include("./components/linkedfiles.html") ?> <!-- All linked files -->
    
</head>

<body>

        <!-- Sidebar -->
        <?php include("./components/sidebar.php") ?>
        <!-- End of sidebar -->

        <!-- Content Start -->
        <div class="content">
          

        <!-- Navbar -->
        <?php include("./components/navbar.php") ?>
        <!-- End of navbar -->

        
        <?php 
    include("config.php");
    $supplier_id = $_GET["id"];
    $qry = "SELECT * FROM supplier WHERE id={$supplier_id}";
    $result = mysqli_query($cn, $qry);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <!-- Add supplier form -->
            <h4 class="mt-3">Edit Supplier</h4>
            <hr>
    <form action="update-supplier.php" method="post">
        <div class="row m-2">
            <div class="col-md-4">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="exampleInputEmail1" class="form-label-sm">Name:</label>
                <input class="form-control form-control-sm" name="name" value="<?php echo $row['sup_name']; ?>" type="text">
            </div>
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">Mobile #:</label>
                <input class="form-control form-control-sm" value="<?php echo $row['sup_mobile']; ?>" name="mobile" type="text">
            </div>
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">CNIC:</label>
                <input class="form-control form-control-sm" value="<?php echo $row['sup_cnic']; ?>" name="cnic" type="text">
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">Address:</label>
                <input class="form-control form-control-sm" name="address" value="<?php echo $row['sup_address']; ?>" type="text">
            </div>
        </div>
            <hr>
        <div class='text-end'>
            <button type="submit" name='update-supplier' class="btn btn-primary "><i class="fa fa-plus"> </i>Update Supplier</button>
        </div>
    </form>
    <?php
        }
    }
    ?>


        </div>
</body>
</html>