<?php
include_once ("connect/dbconnect.php");
$showalert = false;
$showerror = false;
if(isset($_POST ['submit'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $cpassword = $_POST['cpassword'];
//  $exists = false;
 //checking wether the user is existing
 $existsql = "  SELECT * FROM `ussertbl` WHERE `username` = '$username'";
 $result = mysqli_query($conn ,$existsql);
 $NumExistRows = mysqli_num_rows($result); 
 if ($NumExistRows >0)
     {
        // $exist = true;
        $showerror= "User name already exists";
     }
else{
        // $exist =false;
if($password == $cpassword){
     $sql =  "INSERT INTO `ussertbl` (`username`, `password`, `date`) VALUES
     ('$username', '$password', current_timestamp())";
     $result = mysqli_query($conn ,$sql);
     if($result){
     $showalert = true;
   }
    }
else{
    $showerror= "Password dont matched";
    }
}

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login-page</title>
  </head>
  <body>
    <?php
    require 'connect/nav.php';?>
    <?php
    if($showalert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your accout is creates you can signin now.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';}
if($showerror){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$showerror.'.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';}

?>
     <div class="container col-md-6 ">  
  
        <h1 class="text-center">Signup to our Website</h1>
        <form action ="signup.php" method= "post">
  <div class="mb-3 col-md-6 jc-center" >
    <label for="username" class="form-label">username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name ="username" aria-describedby="emailHelp">
   
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control"name ="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">confirm Password</label>
    <input type="password" class="form-control"name ="cpassword" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name = "submit" class="btn btn-primary">Login</button>
  <div class="d-flex"><p>Already have an account</p><a class="ml-10"href="login.php">login Here</a></div>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>