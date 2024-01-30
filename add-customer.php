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
        <?php
        if(isset($_SESSION['status']))
        {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Operation Successful!</strong> <?php  echo $_SESSION['status']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
           
            unset($_SESSION['status']);
        }
        ?>
        <!-- Expense Entry Form -->
        <form action="fir-add-customer.php" method="post">
            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-4">
                    <label for="expenseName" class="form-label"> Name <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseName" name="name" required>
                </div>
                <!-- mfg date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseAmount" class="form-label">Mobile # <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseAmount" name="mobile" required>
                </div>
                <!-- Exp date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseCategory" class="form-label">CNIC <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseAmount" name="cnic" required>
                </div>
            </div>
            <div class="row">
                <!-- Price -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Date of Purchase <span style="color: red;"><b> *</b></span></label>
                    <input type="date" class="form-control" id="expenseDate" name="date" required>
                </div>

            </div>

            <hr>
             <!-- Submit Button -->
             <div class='text-end'>
            <button type="submit" name='add-customer' class="btn btn-primary "><i class="fa fa-plus"> </i> Add Customer</button>
            </div>
        </form>
    </div>
</body>
</html>


