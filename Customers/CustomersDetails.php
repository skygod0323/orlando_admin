<?php

include('../Config/Connection.php');

session_start();

      $login_check=$_SESSION['id'];

       //var_dump($data1);

    if ($login_check!='1') {

       

        header("location: ../Login/login.php");

    }





$tbl_name="customer ORDER BY id  DESC";

$targetpage = "../Customers/CustomersDetails.php";

include('../includes/pagination.php');

include('../includes/header.php');

?>



<style>

.dataTables_length{display:none!important;}

.dataTables_filter{display:none;}

.dataTables_info{display:none;}

div.dataTables_wrapper div.dataTables_paginate {

    margin: 0;

    display: none;

    white-space: nowrap;

    text-align: right;

}

    @media only screen and (max-width: 678px) and (min-width: 0px){

.new-header {

    margin-top: 10px !important;

    width: 50% !important;

    float: left !important;

        }

    .new-fonts {

    font-size: 14px !important;

}

        .new-header {

            padding-left: 0px;

            padding-right: 0px;

    margin-top: 10px !important;

    width: 50% !important;

    float: left !important;

}

    }

</style>





      <div id="content-wrapper">



        <div class="container-fluid">



        



          <!-- DataTables Example -->

      <div class="row">

      <div class="col-md-12">

      <div class="col-md-8 new-header" style="float:left;"><h3 class="new-fonts">Customer Details</h3></div>

      <div class="col-md-4 text-right new-header" style="float:left;" ><a href="../Customers/AddCustomer.php" class="btn btn-primary">Add Customer</a></div>

      </div>

      </div>

      <hr>

      <br>

          <div class="card mb-3">

            <div class="card-header">

              <i class="fas fa-table"></i>

             Customer Details</div>

              <form action="CustomersDetails.php"  method="post">

        <div class="input-group">

           <div class="input-group-append mar-10">

          <input type="text" class="form-control" name='search_name' placeholder="Search for" aria-label="Search" />  

         

            <input style="padding: 4px 12px;border: 1px solid #6c6c6c;font-size: 14px;margin-left:10px;border-radius: 5px;" type="submit" class="btn btn-primary" name="submit"  value="Search">

             <a style="padding: 7px 6px;border: 1px solid #6c6c6c;font-size: 14px;margin-left:10px; border-radius: 5px;" href="CustomersDetails.php" class="btn btn-primary">Show All</a>

           

          </div>

        </div>

      </form>

 <?php



  if(isset($_POST['submit'])=='true')

  {

      $name=$_POST['search_name'];

      $name1=(explode(" ", $name));

  //var_dump( $name1);

      $sql1 =" SELECT * FROM customer WHERE first_name like '%".$name1[0]."%' OR Last_name like'%".$name1[0]."%' ORDER BY id  DESC";

     $q=mysqli_query($db,$sql1);

    ?>

  <div class="card-body">

  <div class="table-responsive">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

  <thead>

    <?php $status=$_SESSION['status'];





    ?>

 <tr id="th-new">

    <th class="th-1">Name</th>



    <th class="th-2">Mobile Number</th>

     <th class="th-3">Last Visit </th>

    <th class="th-4">Home City</th>

     <th class="th-5">Ethnicity</th>

     <th class="th-6">Add Order</th>

    <?php if($status=='1')

    {?>



    <th class="th-7">Edit</th>



    <?php };?>



  </tr>

 </thead>



  <tbody>



<?php   

  if (mysqli_num_rows($q) > 0) {

  while($row1 = mysqli_fetch_assoc($q)) {

  $originalDate=$row1["last_visit"];

  $result16 = mb_substr($row1["Phone_number"], 0, 3);

          $result17 = mb_substr($row1["Phone_number"], 3, 3);

          $result18 = mb_substr($row1["Phone_number"], 6, 4);

          $result19="(".$result16.") ".$result17."-".$result18;

  //print_r($originalDate);die;

  if($originalDate)

  {

  $newDate = date("m/d/Y", strtotime($originalDate));

  }else{

      $newDate=$row["last_visit"]; 

      

  }

  echo "<tr>

  <td>".ucwords($row1["first_name"])." ".ucwords($row1["Last_name"])."</td>



  <td>".$result19."</td>

  <td>".$newDate."</td>

  <td>".ucwords($row1["homecity"])."</td>

  <td>".ucwords($row1["ethnicity"])."</td>

    <td><a href=../Orders/Addorders.php?id=".$row1["id"]." class='btn btn-info' role='button'>Add Order</a></td>";

  if($status=='1'){

  echo "

  <td><a href=UpdateCustomer.php?id=".$row1["id"]." class='btn btn-info' role='button'> Edit</a></td>



  </tr>";

  }

  }

  }



  }



  else{     ?>

 </tbody>

   </table>





       <div class="card-body">

           <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead>

        <?php $status=$_SESSION['status'];





        ?>

        <tr id="th-new">

        <th class="th-1">Name</th>

        <th class="th-2">Mobile Number</th>

        <th class="th-3">Last Visit </th>

        <th class="th-4">Home City</th>



        <th class="th-5">Ethnicity</th>

        <th class="th-6">Add Order</th>

        <?php if($status=='1')

        {?>

        <th class="th-7">Edit</th>



        <?php };?>



        </tr>

        </thead>



        <tbody>



        <?php

        if (mysqli_num_rows($result_page) > 0) {



        while($row = mysqli_fetch_assoc($result_page)) {

       // $originalDate=$row["last_visit"];

        /*var_dump($row['id']);

        var_dump($originalDate);*/

        if($row["last_visit"])

        {

           

         $listVisitDate = date("m/d/Y", strtotime($row["last_visit"]));

         

        }

        else

        {

         $listVisitDate=$row["last_visit"];   

        }

         $result12 = mb_substr($row["Phone_number"], 0, 3);

          $result13 = mb_substr($row["Phone_number"], 3, 3);

          $result14 = mb_substr($row["Phone_number"], 6, 4);

          

          //print_r($result13);exit;

          

      $result15="(".$result12.") ".$result13."-".$result14;

     // var_dump($result15);die;

        

        echo "<tr>

        <td>".ucwords($row["first_name"])." ".ucwords($row["Last_name"])."</td>



        <td>".$result15."</td>

        <td>$listVisitDate</td>

        <td>".ucwords($row["homecity"])."</td>

        <td>".ucwords($row["ethnicity"])."</td>

        <td><a href=../Orders/Addorders.php?id=".$row["id"]." class='btn btn-info' role='button'>Add Order</a></td>";

        if($status=='1'){

        echo "

        <td><a href=UpdateCustomer.php?id=".$row["id"]." class='btn btn-info' role='button'> Edit</a></td>



        </tr>";

        }





        }

        }

        }



        ?>



        </tbody>

        </table>

       </div>

      </div>

   </div>  

</div>

      

        <!-- /.container-fluid -->

    <div class="col-md-12 text-center" style="display: flex;justify-content: center;"> <?php echo $pagination;?> </div>



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







  



  </body>

<script>

     $('#dataTable').dataTable({

"customer": [[ 0, 'desc' ]]

});

</script>

</html>

