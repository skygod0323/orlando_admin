<?php
 include('../Config/Connection.php');
session_start();
      $login_check=$_SESSION['id'];
       //var_dump($data1);
    if ($login_check!='1') {
       
        header("location: ../Login/login.php");
    }
 $id=$_GET['id'];
  $sql="SELECT * FROM customer where id='$id'";
    $result=mysqli_query($db,$sql);
    $user=mysqli_fetch_assoc($result);
          $result16 = mb_substr($user['Phone_number'], 0, 3);
          $result17 = mb_substr($user['Phone_number'], 3, 3);
          $result18 = mb_substr($user['Phone_number'], 6, 4);
          $result19="(".$result16.") ".$result17."-".$result18;

 if(isset($_POST['customer'])){
  //$id=$_GET['id'];
  $fname=$_POST['fname'];
   $lname=$_POST['lname'];
    $mobnumber=$_POST['mobnumber'];
    $mobnumber1  = str_replace("(", "", $mobnumber);
    $mobnumber2  = str_replace(")", "", $mobnumber1);
    $mobnumber3  = str_replace("-", "", $mobnumber2);
$mobnumber4  = str_replace(" ", "", $mobnumber3);
   /* $lastvisit=$_POST['lastvisit'];*/
     $city=$_POST['city'];
     $ethnicity=$_POST['ethnicity'];
   $current_date=date("Y/m/d");
  $newDate = date("m/d/Y", strtotime($current_date));
   
   $customer_update = "UPDATE customer SET 
                          first_name='$fname',
                           Last_name='$lname',
                           Phone_number='$mobnumber4',
                           last_visit='$newDate',
                           homecity='$city',
                           ethnicity='$ethnicity'
                           WHERE id='$id'";
         mysqli_query($db,$customer_update); 
         header( "Location: CustomersDetails.php" );
 }
    

    
include('../includes/header.php');

    
?>



      <div id="content-wrapper">
       <div class="container-fluid">
	   <?php $status=$_SESSION['status']; ?>
	  <div class="row">
      <div class="col-md-12">
      <div class="col-md-8" style="float:left;"><h3> Update Customer</h3></div>
        <?php if($status=='1')
                      {?>
      <div class="col-md-4 text-right" style="float:left;" ><a onClick="return confirm('Are you sure you want to delete?')" href='CustomerDelete.php?id=<?=$id?>'class="btn btn-primary">Delete</a></div>
      <?php };?>
      </div>
      </div>
      <hr>
      <br>
       <?php
    $ethnicityname = "SELECT * FROM ethnicity order by ethncity_name";

   $ethnicitsult = mysqli_query($db,$ethnicityname);
 
    
   ?>
	   
	      <div class="container" style="display:flex;justify-content:center;margin-top:4%; ">
	   <div class="col-md-7">
	   
       <form action="UpdateCustomer.php?id=<?=$id?>" autocomplete='off' method="post">
        <div class="form-group">
    <label for="fname">First Name *</label>
    <input type="text" class="form-control" required name="fname" id="fname" aria-describedby="fname" value='<?=$user['first_name']?>'  placeholder="First Name *">
  </div>
  <div class="form-group">
    <label for="lname">Last Name *</label>
    <input type="text" class="form-control" required name="lname"id="lname" aria-describedby="lname" value='<?=$user['Last_name']?>' placeholder="Last Name *">
  </div>
  <div class="form-group">
    <label for="mobnumber">Mobile Number *</label>
    <input type="text"  maxlength="10"  class="form-control" required name="mobnumber" id="TextBox1" aria-describedby="mobnumber" value='<?=$result19?>' placeholder="Mobile Number *"> 
  </div>
<!--  <div class="form-group">
    <label for="lastvisit">Last Visit  *</label>
    <input type="date" class="form-control" name="lastvisit" id="lastvisit"  required placeholder="Last Visit" value=''>
    <span id="homecity" class="text-danger font-weight-bold"></span>
  </div> -->
  
   <div class="form-group">
    <label for="exampleInputEmail1">Home City *</label>
    <input type="text" class="form-control" required name="city" id="city" aria-describedby="email" placeholder="Home City *"  value='<?=$user['homecity']?>'>
    <span id="homecity" class="text-danger font-weight-bold"></span>
  </div>  <div class="form-group">
   <label for="fname">Ethnicity *</label> 
      <select required  class="form-control" name="ethnicity" id="ethnicity" >
         <!--<option value="">Please Select Ethnicity..</option>-->
         <?php
       while($ethnicitsult1 = mysqli_fetch_assoc($ethnicitsult)) {
        $ethncity_name=$ethnicitsult1['ethncity_name'];

          ?>
     <option <?php if($user['ethnicity']==$ethncity_name){echo "selected";}?> value="<?=$ethncity_name?>"><?=$ethncity_name?></option>
     <?php

   }?>
    </select>
</div>
  
    <div class="form-group" style="text-align:center;">
  <button type="submit"  name="customer"class="btn btn-primary">Update</button>
  </div>
</form>

</div>
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
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>



  </body>

</html>

 <script type="text/javascript">
 $.validate({
    lang: 'en'
  });
</script>
<script>
    $("#TextBox1").on("keyup", function(e) {
  e.target.value = e.target.value.replace(/[^\d]/, "");
 e.target.value=e.target.value.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
  e.target.value=e.target.value.replace(/[^\w ]/,'');
 console.log(e.target.value.length);
  if (e.target.value.length === 10) {
    // do stuff
    var ph = e.target.value.split("");
    ph.splice(3, 0, ") "); ph.splice(7, 0, "-");
    $("#TextBox1").val('('+ph.join(""))
  }
})
</script>
