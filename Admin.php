<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("./components/linkedfiles.html") ?> <!-- All linked files -->
    <title>Admin</title>
    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.admin-profile {
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    
}

.admin-profile img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto 10px;
    display: block;
}

.admin-profile h2 {
    font-size: 24px;
    margin: 0;
    color: #333;
}

.admin-profile p {
    font-size: 16px;
    color: #666;
    margin: 8px 0;
}



    </style>
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
 
        <!-- 2nd Navbar -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Admin.php">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="admin-form.php">Add Profile</a></li>
          </ol>
        </nav>
      <!-- End of 2nd Navbar -->



      <!-- Profile Start -->
      <div class="container">
        <div class="row">
          <div class="col-md-4 mt-5">
              <div class="card mb-4">
                <div class="card-body text-center mt-5">
            <Table>
              <?php
        include("config.php");

        if(mysqli_connect_error()){
         echo "Error connecting to database";
        }
            $qry="SELECT * FROM admin";
            $result = $cn->query($qry);
            if($result->num_rows > 0){
            ?>
             <tr>
              <!-- Admin Picture -->
              <td style="max-width: 200px; max-height: 200px;">
              <img class="img-fluid text-center mb-3 ml-5" src="<?php echo $_SESSION['image']; ?>" alt="user">
              </td>
            </tr>
            <!-- Admin name -->
            <tr>
                <th>Name: </th>
                <td class=""><?php echo $_SESSION['name'] ?></td>
            </tr>
            <!-- Admin Profession -->
            <tr>
              <th>Role:</th>
              <td><?php echo $_SESSION['role'] ?></td>   
            </tr>
            
            <tr>
              <th> <a href="edit-admin.php?id=<?php echo $_SESSION['id']; ?>" class="btn btn-primary"><i class='fa fa-edit'> Edit</i></a> </th>
              <th> <a href="#" class="btn btn-danger" onclick="confirmDelete(event)"> <i class='fa fa-trash'> Delete</i>  </th>
            </tr>
        
            


            <?php
             } 
             ?>
            </Table>
          </div>
        </div>
      </div>


          <!-- Admin Profile Table -->
          <div class="col-md-8">
          <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Father name</th>
                <th>Mobile #</th>
                <th>CNIC</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cn=mysqli_connect("localhost","root","","college");

            if(mysqli_connect_error()){
             echo "Error connecting to database";
            }
            $qry="SELECT * FROM admin";
            $result = $cn->query($qry);
            if($result->num_rows > 0){
            ?>
            <tr>
                <td> <?php echo $_SESSION['name'] ?> </td>
                <td> <?php echo $_SESSION['fname'] ?> </td>
                <td> <?php echo $_SESSION['mobile'] ?> </td>
                <td> <?php echo $_SESSION['cnic'] ?> </td>
                <td> <?php echo $_SESSION['address'] ?> </td>
            </tr>
            <?php
             } 
             ?>
           
            </tbody>
        </table>
          </div>
        </div>
      </div>


  </section>
</body>
</html>

<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default behavior (i.e., navigating to the href)

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Log out the user (you may need to adjust the logout URL)
                window.location.href = 'logout.php';

                // If the user confirms, navigate to the delete URL
                window.location.href = 'delete-admin.php?id=<?php echo $_SESSION['id']; ?>';
            }
        });
    }
</script>


