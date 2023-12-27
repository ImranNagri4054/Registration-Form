<?php
$showAlert = false;
$showError = false;
if(isset ($_POST ["submit"])){
  include_once ("connect/dbconnect.php");
     $username = $_POST["username"];
     $password = $_POST["password"];
     $cpassword = $_POST["cpassword"];
     $exists = false;
  if(($password == $cpassword) && $exists == false){
       $sqll = "INSERT INTO `db_db`(`username` , `password` , `cpassword`)
       VALUES ('$username' , '$password' , '$cpassword')";
      $result = mysqli_query($conn , $sqll);
   if ($result){
    // echo "inserted";
      $showAlert = true;
      }
    }
      else{
        $showError = "Enter same password";
      }  
}
?>
<!-- <?php
include_once ("connect/dbconnect.php");
?> -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Signup_form</title>
  </head>
  <body>
    <?php require 'connect/nav.php'?>
    <?php
    if($showAlert){
    echo ' 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Account have been created you can Signin Now.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
    ?> 
       <?php
    if($showError){
    echo ' 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showError.'.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
    }
    ?> 

    <div class="container col-md-6 my-5" >
        <h1 class = "text-center">Sign here to get services</h1>
        <form action="signup.php" method = "post">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Password</label>
     <input type="password" class="form-control" name="password" id="exampleInputPassword1">
     <div id="emailHelp" class="form-text">Please type same password</div>
  </div>
  <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
     <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
  </div>
       <button type="submit" class="btn btn-primary col-md-12" name ="submit">Signup </button>
     </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>