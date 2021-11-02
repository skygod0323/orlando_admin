<?php

 include('../Config/Connection.php');

 // check login

   session_start();

   $login_check=$_SESSION['id'];

   if ($login_check!='1')

   {

     header("location: ../Login/login.php");

   }//end

        $sql = "SELECT tickettypes.*, theme_parks.name as theme_park_name FROM tickettypes LEFT JOIN theme_parks ON tickettypes.theme_park_id = theme_parks.id";

        $result = mysqli_query($db, $sql);

        $tbl_name="tickettypes";

        $targetpage = "../Ticket/TicketDetails.php";

        include('../includes/pagination.php');

        include('../includes/header.php');

        $result_page = $result;

?>







<!--    ======================copy from here    END  -->

      <div id="content-wrapper">



        <div class="container-fluid">



		

		

				 <div class="row">

		  <div class="col-md-12">

		  <div class="col-md-8" style="float:left;"><h3>Ticket Type Details</h3></div>

		  <div class="col-md-4 text-right" style="float:left;" ><a href="../Ticket/AddTicketType.php" class="btn btn-primary">Add Ticket Type</a></div>

		  </div>

		  </div>

		  <hr>

		  <br>

		  

        

          <!-- DataTables Example -->

          <div class="card mb-3">

            <div class="card-header">

              <i class="fas fa-table"></i>

              Ticket Type Details</div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                      <?php $status=$_SESSION['status']; ?>

                    <tr>

                      <th>Ticket Type</th>

                      <!-- <th>Ticket Code</th>-->

                       <th>Number Of Days</th>

                       <th>Adult price</th>

                        <th>Child price</th>

                         <th>Ticket name</th>

                         <th>Theme park</th>

                          <?php if($status=='1')

                        {?>

                       <th>Edit</th>

                      <th>Delete</th>

                      <?php };?>

                    </tr>

                  </thead>

                  

                  <tbody>

                <?php

               if (mysqli_num_rows($result_page) > 0)

               {

                  while($row = mysqli_fetch_assoc($result_page))

                  {

                   ?>

                   

                   <tr>

                    <td><?php echo $row["ticket_type"];?></td>

                    <td><?php echo $row["numberofdays"];?></td>

                    <td><?php echo $row["adult_price"];?></td>

                    <td><?php echo $row["child_price"];?></td>

                    <td><?php echo $row["ticket_name"];?></td>

                    <td><?php echo $row["theme_park_name"];?></td>

                  <?php if($status=='1'){ ?>

                    <td><a href=UpdateTicketType.php?id=<?php echo $row["id"]; ?> class='btn btn-info' role='button'> Edit</a></td>

                    <td><a  onClick="return confirm('Are you sure you want to delete?')" href=TicketDelete.php?id=<?php echo $row["id"];?> class='btn btn-info' role='button'> Delete</a></td>

                    </tr>

                   <?php 

                   

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

<?php echo $pagination;?>

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

