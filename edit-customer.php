<?php 
include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Entry Form</title>
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


        

    <div class="container mt-5">
        <h2 class="mb-4">Add Customer</h2>
        <hr>
        <!-- Expense Entry Form -->
        <?php 
    include("config.php");
    $cus_id = $_GET["id"];
    $qry = "SELECT * FROM customers WHERE id={$cus_id}";
    $result = mysqli_query($cn, $qry);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <form action="update-customer.php" method="post">
            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-4">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="expenseName" class="form-label"> Name <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" value="<?php echo $row['cus_name']; ?>" id="expenseName" name="name" required>
                </div>
                <!-- mfg date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseAmount" class="form-label">Mobile # <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseAmount" value="<?php echo $row['cus_mobile']; ?>" name="mobile" required>
                </div>
                <!-- Exp date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseCategory" class="form-label">CNIC <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseAmount" value="<?php echo $row['cus_cnic']; ?>" name="cnic" required>
                </div>
            </div>
            <div class="row">
                <!-- Price -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Date of Purchase <span style="color: red;"><b> *</b></span></label>
                    <input type="date" class="form-control" id="expenseDate" value="<?php echo $row['cus_date']; ?>" name="date" required>
                </div>

            </div>

            <hr>
             <!-- Submit Button -->
             <div class='text-end'>
            <button type="submit" name='update-customer' class="btn btn-primary "><i class="fa fa-plus"> </i> Update Customer</button>
            </div>
        </form>
        <?php }}
        ?>
    </div>
</body>
</html>