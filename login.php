<?php
include("config.php");

if(mysqli_connect_error()){
 echo "Error connecting to database";
}

session_start();

if(isset($_POST['login'])){
    $username = $_POST['name'];
    $password = $_POST['password'];
    

    // Getting data from database to compare data
    $sql = "SELECT * FROM admin WHERE name = '$username' AND password = '$password'";
    $result = mysqli_query($cn , $sql) or die ("Query Failed");
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            // if username and password is same to start session
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['mobile'] = $row['mobile'];
            $_SESSION['cnic'] = $row['cnic'];
            $_SESSION['birth'] = $row['birth'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['role'] = $row['role'];

            header("Location:index.php");
           
            
                  }
    }
    else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Login Failed!</strong> Your Username or Password is incorrect...
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }
}
?>
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
                            <!-- Forget Password -->
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                 <a href="">Forgot Password?</a>
                            </div>
                            <!-- Button -->
                            <div class="text-center"> <button type="submit" name="login" class="btn btn-primary w-40 ">Login</button> </div>
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



