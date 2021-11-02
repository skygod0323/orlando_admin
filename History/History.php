<?php
 include('../Config/Connection.php');
 //Login  chack 
     session_start();
    $login_check=$_SESSION['id'];
  if ($login_check!='1') 
  {
    header("location: ../Login/login.php");
      
  }
 // Login End
           //Select History
          $sql = "SELECT DISTINCT barcode FROM `history`";
          $result = mysqli_query($db, $sql);
         
        if(isset($_POST['customer']))
        {
          $ticketdetails=$_POST['ticket_id']; 
          $sql_ticket = "SELECT * FROM `history` WHERE barcode='$ticketdetails'";
          $result_ticket = mysqli_query($db, $sql_ticket);
        }
include('../includes/header.php');
 
?>



      <div id="content-wrapper">
	  
	   <div class="container-fluid">
	  <div class="col-md-12">
		<h3> History Details</h3>
	   <hr>
	   </div>	
	 </div>
	  <div class="row">
		  <div class="col-md-12">
		  <div class="col-md-8" style="float:left;"><h3></h3></div>
		  <div class="col-md-4 text-right" style="float:left;" ><a href="../History/AddHistory.php" class="btn btn-primary">Add History</a></div>
		  </div>
		  </div>
       <div class="container" style="display:flex;justify-content:center;margin-top:4%; ">
	   <div class="col-md-7">
       <form action="History.php" method="post">
            <label for="fname">Barcode</label> 
      <select required class="form-control"  name="ticket_id">
          <option value="0">Please Select</option> 
         <?php
         while($row = mysqli_fetch_assoc($result)) { ?>
      <option value="<?=$row['barcode']?>"><?=$row['barcode']?></option>
     <?php
   }
      
     ?>   
      </select><br>
      
     
   <div class="form-group" style="text-align:center;">
 <button type="submit"  name="customer"class="btn btn-primary">Submit</button>
 
 </div>
</form>

<div class='row'>
    
    <div class='col-sm-12'><p style="color:red;">Here's The Days & Times You Were In The Park</p>  <hr></div>
  
    <?php if($result_ticket){ ?>

    <?php
    //$a=0;
    while($user=mysqli_fetch_assoc($result_ticket))
    {
       //var_dump($user);die;
       
       
    ?>
          <div class='col-sm-12'><p><?=date("l F d",strtotime($user['history_date']));?> <?=$user['park'] ?> /<?=$user['history_time']?>  <?php if($user['method_transfer']!=="no"){print_r($user['method_transfer']);}?></p>  <hr></div> 
 
<?php }} ?>
</div>
</div>
</div>
</div>

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
          <!-- <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div> -->
      </div>
    </div>

 

  </body>

</html>