<?php
include_once ("connect/dbconnect.php");
?>
<?php
$showAlert = false;
$showError = false;
if(isset ($_POST ["submit"])){
  include_once ("connect/dbconnect.php");
     $username = $_POST["username"];
     $password = $_POST["password"];
     $cpassword = $_POST["cpassword"];
     $exists = false;
  if(($password == $cpassword) && $exists =false){
       $sql = "INSERT INTO `db_db`(`username` , `password` , `cpassword`)
       VALUES ('$username' , '$password' , '$cpassword')";
      $result = mysqli_query($conn , $sql);
   if ($result){
      $showAlert = true;
      }
    }
      else{
        $showError = "Enter same password";
      }
    
}
?>