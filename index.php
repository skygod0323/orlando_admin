
<?php
include('Config/Connection.php');
 
 session_start();
      $login_check=$_SESSION['id'];
       //var_dump($data1);
    if ($login_check!='1') {
     
        header("location: Login/login.php");
   
   
    
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
<link rel="icon" href="vendor/iconorlando.png" type="vendor/iconorlando.png" >
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">



    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="">Universal Orlando Resort</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
       
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          
            <a class="dropdown-item" href="Login/logout.php" >Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
	   <li class="nav-item" style="cursor: pointer;">
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
       
	   <li class="nav-item" style="cursor: pointer;">
          <a class="nav-link" href="Customers/CustomersDetails.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Customers</span>
          </a>
        </li>

      <li class="nav-item" style="cursor: pointer;">
          <a class="nav-link" href="Ticket/DetailsTicket.php?active=0">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tickets</span>
          </a>
        </li>
          <li class="nav-item dropdown" style="cursor: pointer;">
          <a class="nav-link" href="Orders/Orderdetails.php?active=0">
            <i class="fas fa-fw fa-folder"></i>
            <span>Orders</span>
          </a>
        
        </li>
      
          <li class="nav-item dropdown" style="cursor: pointer;">
          <a class="nav-link" href="History/History.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>History</span>
          </a>
        
        </li>
        <li class="nav-item dropdown" style="cursor: pointer;">
          <a class="nav-link" href="Map/Location.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Map</span>
          </a>
        
  <!--      </li>
    <li class="nav-item dropdown" style="cursor: pointer;">
          <a class="nav-link" href="Menu/MenuDetails.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Menu</span>
          </a>
        
        </li>-->
          <li class="nav-item dropdown" style="cursor: pointer;">
          <a class="nav-link" href="Settings/SettingDetails.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Settings</span>
          </a>
        
        </li>
   
      </ul>

		

  
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
       
        </div>
      </div>
    </div>



<!--middle content start -->
<!--<form action="index.php" method="post" enctype="multipart/form-data">
    
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
    <input type="submit" value="Upload Image" name="submit">
</form>-->
	
<!--middle content end -->



    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>




    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    lang: 'es'
  });
</script>

  </body>

</html>


      <div id="content-wrapper">
         <p style="font-size:56px;font-family:'Work Sans', sans-serif; font-weight:700; color:#343a40;"  align="center" >WELCOME </p>
       
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    ---->

  </body>

</html>
