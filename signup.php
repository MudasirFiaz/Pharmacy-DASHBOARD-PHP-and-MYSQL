<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signin</title>
    <?php include("./components/linkedfiles.html") ?> <!-- All linked files -->
</head>

<body style="background-color: skyblue;">
<!-- Sign In Start -->
<form action="" method="post">
    <div class="container-xxl position-relative bg-#99FFFF d-flex p-0">
      <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between text-center ml-5 mb-2"><h3><b>Admin Panel</b></h3></div>
                            <!-- Username -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Enter name">
                                <label for="floatingInput">Username</label>
                            </div>
                             <!-- Password -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <!-- Button -->
                            <div class="text-center"> <button type="submit" name="login" class="btn btn-primary w-40 ">Sign Up</button> </div>
                            <p class="text-center mb-0">Don't have an Account? <a href="">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</form>
 <!-- Sign In End --> 
</body>
</html>



