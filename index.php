<?php include("auth.php"); ?> <!-- Auth file link -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Dashboard Admin</title>
    <?php include("./components/linkedfiles.html") ?> <!-- All linked files -->
    </head>

    <body>
        <div class="container-xxl position-relative bg-white d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading....</span>
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


            <!-- Content -->
            <?php include("./components/content.html") ?>
            <!-- End of content -->
            
            <!-- Footer -->
            <?php include("./components/footer.html") ?>
            <!-- End of footer -->
            
            </div>
            <!-- Content End -->

    </div>


    </body>

</html>