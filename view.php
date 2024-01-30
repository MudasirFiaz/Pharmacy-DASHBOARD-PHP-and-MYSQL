<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard Admin</title>
    <script src="sweetalert2.min.js"></script>
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include("./components/linkedfiles.html") ?> <!-- All linked files -->
   
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

         <!-- Sidebar -->
         <?php include("./components/sidebar.php") ?>
        <!-- End of sidebar -->

         <!-- Content Start -->
         <div class="content">
          

          <!-- Navbar -->
          <?php include("./components/navbar.php") ?>
          <!-- End of navbar -->

          <!-- table of tours -->
            <div class="row nt-3">
                <div class="col-md-6"></div>
                <div class="col-md-6"> 
                <?php
        if(isset($_SESSION['status']))
        {
            ?>
            <script>
                Swal.fire({
                    title: "Operation Successful!",
                    text: "<?php echo $_SESSION['status'] ?>",
                    icon: "error"
                    });
</script>
            <?php
           
            unset($_SESSION['status']);
        }
        ?>
        </div>
            </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicine name</th>
                <th>MFG </th>
                <th>EXP</th>
                <th>Quantity</th>
                <th>Supplier</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config.php");
            $view_qry="SELECT * FROM medicine";
            $result = $cn->query($view_qry);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            


             ?>
            <tr>
                <td> <?php echo $row['id'] ?> </td>
                <td> <?php echo $row['med_name'] ?> </td>
                <td> <?php echo $row['med_mfg'] ?> </td>
                <td> <?php echo $row['med_exp'] ?> </td>
                <td> <?php echo $row['med_quantity'] ?> </td>
                <td> <?php echo $row['med_supplier'] ?> </td>
                <td>
                    <a href="edit-medicine.php?id=<?php echo $row['id']; ?>"><i class='fa fa-edit'></i></a>
                    |
                    <a href="delete-medicine.php?id=<?php echo $row['id']; ?>"><i class='fa fa-trash'></i></a>
                </td>
                
            </tr>
            <?php } } ?>
           
            </tbody>
        </table>
</div>
</body>
</html>

