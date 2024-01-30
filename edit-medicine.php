<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php include("./components/linkedfiles.html") ?>
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


        <!-- Sidebar Start -->
        <?php include("./components/sidebar.php") ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">



        <!-- Navbar Start -->
          <?php include("./components/navbar.php") ?>
        <!-- Navbar End -->


    <?php 
    include("config.php");
    $med_id = $_GET["id"];
    $qry = "SELECT * FROM medicine WHERE id={$med_id}";
    $result = mysqli_query($cn, $qry);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
    ?>

<form method="post" action="update-medicine.php">
<div class="row">
                <!-- Name -->
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3 col-md-4">
                    <label for="expenseName" class="form-label">Medicine name <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" value="<?php echo $row['med_name']; ?>" id="expenseName" name="name" required>
                </div>
                <!-- mfg date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseAmount" class="form-label">MFG Date <span style="color: red;"><b> *</b></span></label>
                    <input type="date" class="form-control" value="<?php echo $row['med_mfg']; ?>" id="expenseAmount" name="menufecture" required>
                </div>
                <!-- Exp date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseCategory" class="form-label">EXP Date <span style="color: red;"><b> *</b></span></label>
                    <input type="date" class="form-control" id="expenseAmount" value="<?php echo $row['med_exp']; ?>" name="expiry" required>
                </div>
            </div>

            <div class="row">
               <!-- supplier name -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Supplier <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseDate" value="<?php echo $row['med_supplier']; ?>" name="supplier" required>
                </div>

                <!-- Price -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Price <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" value="<?php echo $row['med_price']; ?>" id="expenseDate" name="price" required>
                </div>

                <!-- medicine image -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Image <span style="color: red;"><b> *</b></span></label>
                    <input type="file" class="form-control" value="<?php echo $row['med_img']; ?>" id="expenseDate" name="image" required>
                </div>
            </div>

            <div class="row">
                <!-- Quantity -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Stock Quantity <span style="color: red;"><b> *</b></span></label>
                    <input type="number" class="form-control" id="expenseDate" value="<?php echo $row['med_quantity']; ?>" name="quantity" required>
                </div>
            </div>

            <hr>
             <!-- Submit Button -->
             <div class='text-end'>
            <button type="submit" name='update-med' class="btn btn-primary "><i class="fa fa-plus"> </i> Update Medicine</button>
            </div>     
</form>
<?php
 }
}
 ?>
             


        <!-- Footer Start -->
        <?php include("./components/footer.html") ?>
        <!-- Footer End -->
        </div>
        <!-- Content End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>