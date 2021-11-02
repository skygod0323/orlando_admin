<?php
 include('../Config/Connection.php');
session_start();
if(isset($_POST['sub'])){
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $password = mysqli_real_escape_string($db,$_POST['password']); 
 $sql = "SELECT id,status FROM login_user WHERE email ='$email' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $count = mysqli_num_rows($result);
      $status = $row['status'];
      
     if($count == 1) {
      $_SESSION['id'] = 1;
      $_SESSION['login_user'] = $email;
      $_SESSION['status'] =$status;
      header("location: ../index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      
          //header("location: login.php");
         
      }
   
}
?>






<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>Universal Orlando Resort</title>
<link rel="icon" href="../vendor/iconorlando.png" type="../vendor/iconorlando.png" >
    <!-- Bootstrap core CSS-->
   

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action=login.php method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" autocomplete="off" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">

               <!-- <label for="inputEmail">Email address</label>-->
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" autocomplete="off" required="required">
                 <!--<label for="inputPassword">Password</label>-->
                 <span><?php if(isset($error)) { echo $error;}?></span>

              </div>
            </div>
            
            <input class="btn btn-primary btn-block" type="submit" value="Login" name="sub" />
          <!--   <a class="btn btn-primary btn-block" href="index.php">Login</a> -->
          </form>
          <div class="text-center">
            <!-- <a class="d-block small mt-3" href="register.php">Register an Account</a> -->
           
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
