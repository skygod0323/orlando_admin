<?php
  include('../Config/Connection.php');
   session_start();
      $login_check=$_SESSION['id'];
       //var_dump($data1);
    if ($login_check!='1') {
       
        header("location: ../Login/login.php");
    }
 
 $id=$_GET['id'];
      
        $sql="SELECT * FROM `menuoptions` where id='$id'";
        $result=mysqli_query($db,$sql);
        $user=mysqli_fetch_assoc($result);
   $base_url=  "http://" . $_SERVER['SERVER_NAME'];
  if(isset($_POST['customer']))
  {
   
        $title = mysqli_real_escape_string($db,$_REQUEST['title']);
       // var_dump($title);die;
       // $title  = str_replace(" ", "", $title);
        $urldata = $_REQUEST['urldata'];
        if ($_FILES["fileToUpload"]["name"] != NULL)
        {
           
         $filename = time().'.'.basename($_FILES['fileToUpload']['name']); 
          if ($_FILES["fileToUpload"]["size"] > 51100) {
     echo "<script>alert('Sorry, your file is too large');</script>";
        $uploadOk = 0;
        header( "Location: UpdateMenu.php?id=$id&error=1" );
       EXIT;
      
       }
         
         $target_file = "../iocnuploads/".$filename;
       
         $var =  move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
      
         $fileToUpload = "$base_url/app/OrlandoAdmin/iocnuploads/".$filename; 
        //$document[$i] =str_replace(",","_",$document[$i]);
        
        }
        else
        {
          $fileToUpload = $user['icon'];
           
        }
       
        $created_on = time();
        $updated_on = time();
        
     $image_insert="UPDATE `menuoptions` SET
     `icon`='$fileToUpload',
     `title`='$title',
     `url`='$urldata',
     `created_on`='$created_on',
      `updated_on`='$updated_on'
      WHERE id='$id'";
    //var_dump( $image_insert);die;
    
    $result = mysqli_query($db,$image_insert);
    
    header( "Location: MenuDetails.php" );
  
    
    }
 

  
    
    include('../includes/header.php');
?>


      <div id="content-wrapper">
	  <div class="container-fluid">
	  <div class="col-md-12">
		<h3>Update Menu Option's</h3>
	   <hr>
	   </div>	
	 </div>
       <div class="container" style="display:flex;justify-content:center;margin-top:4%; ">
	   <div class="col-md-7">
       <form action="UpdateMenu.php?id=<?=$id?>" name='customer' enctype='multipart/form-data' autocomplete='off' method="post">
        <div class="form-group">
    <label for="fname">Icon * (max 100x100)</label><br>
     <input type="file"    name="fileToUpload" id="fileToUpload">
  </div>
   
   <div class="form-group">
    <label for="fname">Title *</label>
    <input type="text" class="form-control"  required name="title" id="title" value="<?=$user['title']?>" aria-describedby="fname" placeholder="Title*">
  </div>
   <div class="form-group">
    <label for="fname">Url *</label>
    <input type="text" class="form-control" required name="urldata" value="<?=$user['url']?>" id="urldata"  placeholder="Url *">
  </div>

  <div class="form-group" style="text-align:center;">
 <button type="submit"  name="customer" class="btn btn-primary">Submit</button>
 </div>
</form>
</div>
</div>
      
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Universal Orlando Resort 2018</span>
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

    <!-- Logout Modal-->
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
         
      </div>
    </div>

  

  </body>
<?php
  $mes=$_GET['error'];
    if($mes==1)
    {
         echo "<script>alert('Sorry, your file is too large');</script>";
    }
    else{
          header( "Location: MenuDetails.php" );
    }
?>
</html>
 
