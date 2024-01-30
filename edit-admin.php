<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin-form</title>
    <?php include("./components/linkedfiles.html") ?>
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

    <!-- Admin form -->
    <?php 
    include("config.php");
    $admin_id = $_GET["id"];
    $qry = "SELECT * FROM admin WHERE id={$admin_id}";
    $result = mysqli_query($cn, $qry);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
<form action="update-admin.php" method="post" enctype="multipart/form-data">
<div class="row m-2">
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Father Name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Password<span class="text-danger">*</span></label>
        <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Mobile<span class="text-danger">*</span></label>
        <input type="text" class="form-control" value="<?php echo $row['mobile']; ?>" name="mobile" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
</div>
<div class="row m-2">   
   
     <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">CNIC<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="cnic" value="<?php echo $row['cnic']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Birth<span class="text-danger">*</span></label>
        <input type="date" class="form-control" name="birth" value="<?php echo $row['birth']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Address<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Image<span class="text-danger">*</span>(Max Size:100kb)</label>
        <input type="file" class="form-control" name="image" value="<?php echo $row['image']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
</div>
<div class="row m-2">
    <div class="col-3">
        <label for="exampleInputEmail1" class="form-label">Role<span class="text-danger">*</span></label>
        <select class="form-control"  name='role' value="<?php echo $row['role']; ?>" required >
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
</div> 
<hr>
    <button type="submit" class="btn btn-success" name="update-admin" style="margin-left: 900px;"> <span><i class="fa fa-wrench"></i></span> Update</button>
</form>
<?php 
        }
    }
?> 
    <!-- Admin form End -->
</section>
</body>
</html>