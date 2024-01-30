<?php 
include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Entry Form</title>
      <!-- Include SweetAlert CDN -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <h2 class="mb-4">Add Medicine</h2>
        <hr>
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
        <!-- Expense Entry Form -->
        <form action="fir-add-medicine.php" enctype="multipart/form-data" method="post">
            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-4">
                    <label for="expenseName" class="form-label">Medicine name <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseName" name="name" required>
                </div>
                <!-- mfg date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseAmount" class="form-label">MFG Date <span style="color: red;"><b> *</b></span></label>
                    <input type="date" class="form-control" id="expenseAmount" name="menufecture" required>
                </div>
                <!-- Exp date -->
                <div class="mb-3 col-md-4">
                    <label for="expenseCategory" class="form-label">EXP Date <span style="color: red;"><b> *</b></span></label>
                    <input type="date" class="form-control" id="expenseAmount" name="expiry" required>
                </div>
            </div>

            <div class="row">
               <!-- supplier name -->
                    <?php
                        include("config.php");

                        $view_qry = "SELECT * FROM supplier";
                        $result = $cn->query($view_qry);

                        if ($result->num_rows > 0) {
                            ?>
                            <div class="mb-3 col-md-4">
                                <label for="supplier" class="form-label">Supplier <span style="color: red;"><b>*</b></span></label>
                                <select name="supplier" id="supplier" class="form-select">
                                    <option value="" class="disabled">-----Select Supplier-----</option>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        $sup_name = $row['sup_name']; // Change to the actual column name

                                        echo "<option value='$sup_name'>$sup_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php
                        }
                        ?>

                <!-- Price -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Price <span style="color: red;"><b> *</b></span></label>
                    <input type="text" class="form-control" id="expenseDate" name="price" required>
                </div>

                <!-- medicine image -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Image <span style="color: red;"><b> *</b></span></label>
                    <input type="file" class="form-control" id="expenseDate" name="image" required>
                </div>
            </div>

            <div class="row">
                <!-- Quantity -->
                <div class="mb-3 col-md-4">
                    <label for="expenseDate" class="form-label">Stock Quantity <span style="color: red;"><b> *</b></span></label>
                    <input type="number" class="form-control" id="expenseDate" name="quantity" required>
                </div>
            </div>

            <hr>
             <!-- Submit Button -->
             <div class='text-end'>
            <button type="submit" name='add-med' class="btn btn-primary "><i class="fa fa-plus"> </i> Add Medicine</button>
            </div>
        </form>
    </div>
</body>
</html>


