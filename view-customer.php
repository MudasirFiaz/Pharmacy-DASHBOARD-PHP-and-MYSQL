<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard Admin</title>
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
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
                <div class="col-md-6 mt-2"> 
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
                <th>Customer Name</th>
                <th>Mobile #</th>
                <th>CNIC</th>
                <th>Date of Purchase</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config.php");
            $view_qry="SELECT * FROM customers";
            $result = $cn->query($view_qry);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            


             ?>
            <tr>
                <td> <?php echo $row['id'] ?> </td>
                <td> <?php echo $row['cus_name'] ?> </td>
                <td> <?php echo $row['cus_mobile'] ?> </td>
                <td> <?php echo $row['cus_cnic'] ?> </td>
                <td> <?php echo $row['cus_date'] ?> </td>
                <td>
                    <a href="edit-customer.php?id=<?php echo $row['id']; ?>"><i class='fa fa-edit'></i></a>
                    |
                    <a href="delete-customer.php?id=<?php echo $row['id']; ?>"><i class='fa fa-trash'></i></a>
                </td>
                
            </tr>
            <?php } } ?>
           
            </tbody>
        </table>
</div>
</body>
</html>
