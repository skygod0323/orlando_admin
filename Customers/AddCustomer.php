<?php
 include('../Config/Connection.php');
 //Check Login
      session_start();
       $login_check=$_SESSION['id'];
     if ($login_check!='1')
     {
       header("../Login/login.php");
     }
     
    //End Login
    //Insert Customers
    if(isset($_POST['customer']))
    {
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $mobnumber=$_POST['mobnumber'];
      $mobnumber1  = str_replace("(", "", $mobnumber);
       $mobnumber2  = str_replace(")", "", $mobnumber1);
       
       $mobnumber3  = str_replace("-", "", $mobnumber2);
        $mobnumber4  = str_replace(" ", "", $mobnumber3);
     // var_dump($mobnumber4);die;
       //$lastvisit=$_POST['lastvisit'];
      $city=$_POST['city'];
      $ethnicity=$_POST['ethnicity'];
      $current_date=date("Y/m/d");
     
       $newDate = date("m/d/Y", strtotime($current_date));
       
      $customer_insert = "INSERT INTO customer (first_name,Last_name,Phone_number,last_visit,homecity,ethnicity)
                     VALUES ('$fname','$lname','$mobnumber4','$newDate','$city','$ethnicity')";
      $result = mysqli_query($db,$customer_insert);
       $id= mysqli_insert_id($db); 

      header( "Location: ../Orders/Addorders.php?id=$id" );
    
     /* header( "Location: CustomersDetails.php" );*/
    
    }
    //End Insert
    //Include Header
 include('../includes/header.php');
 //End Header
?>
      <div id="content-wrapper">
       <div class="container-fluid">
	  
	  <div class="col-md-12">
		<h3>Add Customer</h3>
	  <hr>
	   </div>	
	  <?php
    $ethnicityname = "SELECT * FROM ethnicity order by ethncity_name";

   $ethnicitsult = mysqli_query($db,$ethnicityname);
 
    
   ?>
	 
	   <div class="container" style="display:flex;justify-content:center;margin-top:4%; ">
	   <div class="col-md-7">
	   
      <form action="AddCustomer.php" autocomplete='off' method="post" onblur="return validation();" name="vfrom">
        <div class="form-group">
    <label for="fname">First Name *</label>
    <input type="text" required class="form-control" name="fname" id="fname" aria-describedby="fname"  placeholder="First Name *" value="" >
    <span id="username"  class="text-danger font-weight-bold"> </span>
  </div>
  <div class="form-group">
    <label for="lname">Last Name *</label>
    <input type="text" class="form-control" name="lname"id="lname" aria-describedby="lname" required placeholder="Last Name *" value="">
    <span id="lastname" class="text-danger font-weight-bold"> </span>
  </div>
   <div class="form-group">
        
    <label for="mobnumber">Mobile Number *</label>
    <input type="text" maxlength="10"  required class="form-control" name="mobnumber" id="TextBox1" aria-describedby="mobnumber" placeholder="Mobile Number *"  value="">
  </div>
  
   <div class="form-group">
    <label for="Homecity">Home City *</label>
    
    <input type="text" class="form-control" name="city" id="city" aria-describedby="email" required placeholder="Home City *" value="">
    <span id="homecity" class="text-danger font-weight-bold"></span>
  </div> 
 <div class="form-group">
   <label for="fname">Ethnicity *</label> 
      <select required  class="form-control" name="ethnicity" id="ethnicity" >
         <option value="">Please Select Ethnicity..</option>
         <?php
       while($ethnicitsult1 = mysqli_fetch_assoc($ethnicitsult)) {
        $ethncity_name=$ethnicitsult1['ethncity_name'];

          ?>
     <option value="<?=$ethncity_name?>"><?=$ethncity_name?></option>
     <?php

   }?>
    </select>
</div>
      
   
 
   <div class="form-group" style="text-align:center;">
  <button type="submit"  id="abcd"  onclick="myFunction()" name="customer"class="btn btn-primary">Submit</button>
  </div>
</form>

</div >
</div>
</div>
       

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

  </body>

</html>
