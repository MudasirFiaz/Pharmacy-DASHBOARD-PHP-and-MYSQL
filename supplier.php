<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Entry Form</title>
    <?php include("./components/linkedfiles.html") ?> <!-- All linked files -->
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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

        
        <!-- Add supplier form -->
            <h4 class="mt-3">Add Supplier</h4>
            <hr>
    <form action="fir-add-supplier.php" method="post">
        <div class="row m-2">
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">Name:</label>
                <input class="form-control form-control-sm" name="name" type="text">
            </div>
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">Mobile #:</label>
                <input class="form-control form-control-sm" name="mobile" type="text">
            </div>
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">CNIC:</label>
                <input class="form-control form-control-sm" name="cnic" type="text">
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-4">
                <label for="exampleInputEmail1" class="form-label-sm">Address:</label>
                <input class="form-control form-control-sm" name="address" type="text">
            </div>
        </div>
            <hr>
        <div class=' text-end'>
            <!-- If data is added than this alert is showed -->
            <?php
        if(isset($_SESSION['status']))
        {
            ?>
            <script>
                Swal.fire({
                    title: "Operation Successful!",
                    text: "<?php echo $_SESSION['status'] ?>",
                    icon: "success"
                    });
            </script>
            <?php
           
            unset($_SESSION['status']);
        }
        ?>
            <!-- If data is deleted than this alert is shown -->
            <?php
        if(isset($_SESSION['delete']))
        {
            ?>
            <script>
                Swal.fire({
                    title: "Operation Successful!",
                    text: "<?php echo $_SESSION['delete'] ?>",
                    icon: "error"
                    });
</script>
            <?php
           
            unset($_SESSION['delete']);
        }
        ?>

            <button type="submit" name='add-sup' class="btn btn-primary "><i class="fa fa-plus"> </i> Add Supplier</button>
        </div>
    </form>

        <table id="example" class="table stripped-table mt-5" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile #</th>
                <th>CNIC</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config.php");
            $view_qry="SELECT * FROM supplier";
            $result = $cn->query($view_qry);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td> <?php echo $row['id'] ?> </td>
                <td> <?php echo $row['sup_name'] ?> </td>
                <td> <?php echo $row['sup_mobile'] ?> </td>
                <td> <?php echo $row['sup_cnic'] ?> </td>
                <td> <?php echo $row['sup_address'] ?> </td>
                <td>
                    <a href="edit-supplier.php?id=<?php echo $row['id']; ?>"><i class='fa fa-edit'></i></a>
                    |
                    <a href="delete-supplier.php?id=<?php echo $row['id']; ?>"><i class='fa fa-trash'></i></a>
                </td>
                
            </tr>
            <?php } } ?>

        </div>
</body>
</html>