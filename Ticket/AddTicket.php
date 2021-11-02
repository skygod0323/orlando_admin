<?php

            include('../Config/Connection.php');

                //Login check

            session_start();

            $login_check=$_SESSION['id'];

            if ($login_check!='1')

          { 

              header("location: ../Login/login.php");

           }

           $base_url=  "http://" . $_SERVER['SERVER_NAME'];

            //End 

                

         if(isset($_POST['submitticket']))

           {   
             $name_on_ticket =$_POST['name_on_ticket'];

               $ticketpass=$_POST['ticketpass'];

                     $node=$_POST['node'];

                     $trans_no=$_POST['trans_no'];

                     $print_date=$_POST['print_date'];

                     $batchnumber=$_POST['batchnumber'];

                     $set=$_POST['set']; 

                     $entitlement=$_POST['entitlement'];

                     $type=$_POST['type'];

                     $gender=$_POST['gender'];

                     $broker=$_POST['broker'];

                     $purchase_place=$_POST['purchase_place'];

                     $price=$_POST['price'];

                     $theme_park_parent_id=$_POST['theme_park_parent_id'];

                     $expire_date=$_POST['date'];

                     $active=$_POST['active'];

             

                     $ticketshowid=$_POST['ticketshowid'];

                     

                    /* $ticket_number=explode(" ",$ticketshowid);*/

                   $ticket_number=  preg_split('/\s+/',  $ticketshowid);

                   /*  print_r($ticket_number);die;*/

       

                     $loopCount=count($ticket_number);

                     for ($i = 0; $i < $loopCount; $i++) 

             {

              $ticketshowid=$ticket_number[$i];

             /* var_dump($ticketshowid); die;*/

              if(!empty($ticketshowid))

              {

              

               $ticket_insert = "INSERT INTO ticket(`name_on_ticket`,`ticket_type`,`type`,`gender`,purchased_place,cost,ticketshowid,expire_date,node,broker,batch_number,set_link,entitlement,trans_number,print_date,active,theme_park_parent_id)

              VALUES ('$name_on_ticket','$ticketpass','$type', '$gender','$purchase_place','$price','$ticketshowid','$expire_date','$node','$broker','$batchnumber','$set','$entitlement','$trans_no','$print_date','$active', $theme_park_parent_id)";
                
                $result = mysqli_query($db,$ticket_insert);

                 if($result=='true')

                {

                  echo "<script>alert('Added succesfully');

                      document.location.href='$base_url/app/OrlandoAdmin/Ticket/DetailsTicket.php?active=0';</script>";

                }

             }

             }

               // header( "Location: DetailsTicket.php" );

        

           }

                include('../includes/header.php');

                ?>

<?php 
  $theme_park_parents_query = "SELECT * FROM theme_park_parents ORDER BY code DESC";
  $theme_park_parents = mysqli_query($db, $theme_park_parents_query);
?>



<style>

    textarea.form-control {

    height: 143px !important;

}

.left-col{margin-top: 10px;

            float: left !important;

            width: 32% !important;

        }

        .right-col{margin-top: 10px;

            float: left !important;

            width: 67% !important;

        }



    @media only screen and (max-width: 678px) and (min-width: 0px)  {

        .left-col{margin-top: 10px;

            float: left !important;

            width: 50% !important;

        }

        .right-col{margin-top: 10px;

            float: left !important;

            width: 50% !important;

        } 

    footer.sticky-footer {

    display: -webkit-box;

    display: -ms-flexbox;

    display: flex;

    position: fixed !important;

    right: 0;

    bottom: 0;

    width: calc(100% - 90px);

    height: 60px;

    background-color: #e9ecef;

}

        

        

            .new-fonts{

                font-size: 20px !important;

            }

        . small-btn{

            margin-top: 40px !important;

        }

    }

    @media only screen and (max-width: 780px) and (min-width: 750px)  {

        

       .left-col{margin-top: 10px;

            float: left !important;

            width: 52% !important;

        }

        .right-col{margin-top: 10px;

            float: left !important;

            width: 48% !important;

        } 

    }

     @media only screen and (max-width: 1290px) and (min-width: 1230px)  {

    .left-col{margin-top: 10px;

            float: left !important;

            width: 28% !important;

        }

        .right-col{margin-top: 10px;

            float: left !important;

            width: 70% !important;

        }

    }

</style>

      <div id="content-wrapper">

	  

	   <div class="container-fluid">

	  <div class="col-md-12">

		<h3 class="new-fonts">Add Ticket</h3>

	   <hr>

	   </div>	

	 </div>

	 

      <div class="container-fluid" style="display:flex;justify-content:center;">

	   <div class="col-md-12" style="display:table;">

       <form action="AddTicket.php" autocomplete='off' method="post">

          <div class="" style="display:table;"> 

        <div class="col-md-6"style="float:left;">

  <!--  <label for="fname">Barcode *</label>-->

    <!--<input type="text" class="form-control"  required name="ticketshowid" id="ticketshowid" aria-describedby="fname" placeholder="Barcode *" value="" >-->

       <div class="left-col">      

    <label for="fname">Barcode </label>

            </div>

             <div class="right-col">

   <textarea rows="3" cols="84" required  name="ticketshowid" id="ticketshowid" class="form-control"   >

</textarea>

  </div>

           </div>

           

        <div class="col-md-6" style="float:left;">

       <div class="left-col">

    <label for="fname">Name On Ticket </label>

       </div> 

       <div class="right-col">

    <input type="text" class="form-control"  name="name_on_ticket" id="name" aria-describedby="node" placeholder="Name On Ticket  *">

  </div>

           </div>    

           

           

           

   <div class="col-md-6" style="float:left;"> 

       <div class="left-col">

<label for="type">Ticket Type</label>

       </div>

       <div class="right-col">

   <select class="form-control" name="ticketpass" >

 

    <option  value=" Annual pass">Regular Ticket</option>

    <option  value="Regular Ticket">Annual pass</option>

  </select>

       </div>

  </div>

  

   <div class="col-md-6" style="float:left;">

       <div class="left-col">

    <label for="fname">Node</label>

       </div>

       <div class="right-col">

    <input type="text" class="form-control"  name="node" id="name" aria-describedby="node" placeholder="Node *">

  </div>

           </div>

           

 <div class="col-md-6" style="float:left;">

     <div class="left-col">

    <label for="fname">Trans No</label>

     </div>

     <div class="right-col">

    <input type="text" class="form-control"  name="trans_no" id="trans_no" aria-describedby="trans_no" placeholder="Trans No *">

  </div>

           </div>

           

  

   <div class="col-md-6" style="float:left;">

       <div class="left-col">

    <label for="fname">Print Date</label>

       </div>

       <div class="right-col">

   <input type="date" class="form-control"  name="print_date"  id="print_date" aria-describedby="print_date" placeholder="Print Date *">

       </div>

  </div>

  <div class="col-md-6" style="float:left;">

      <div class="left-col">

    <label for="fname">Batch Number</label>

      </div>

      <div class="right-col">

    <input type="text" class="form-control"  placeholder='Batch Number *'  name="batchnumber" id="batchnumber" aria-describedby="batchnumber" >

  </div>

           </div>

  

  <div class="col-md-6" style="float:left;">

      <div class="left-col">

    <label for="fname">Set Link</label>

      </div>

      <div class="right-col">

   <input type="text" class="form-control"  name="set"  id="set" aria-describedby="set" placeholder="Set Link *">

  </div>

           </div>

           

   <div class="col-md-6" style="float:left;"> 

   <div class="left-col">

    <label for="fname">Ticket Print</label>

       </div>

       <div class="right-col">

       <input type="text" class="form-control" name="entitlement" id="entitlement" aria-describedby="entitlement" placeholder="Ticket Print">

       </div>

     </div>

     

  

  

   <div class="col-md-6" style="float:left;">

       <div class="left-col">

<label for="type">Type</label>

       </div>

       <div class="right-col">

   <select class="form-control" name="type">

 

    <option  value="adult">Adult</option>

    <option  value="child">Child</option>

    <option  value="youth">Youth</option>

    <option  value="comp">Comp</option>

  </select>  

  </div>

</div>


<div class="col-md-6" style="float:left;">

       <div class="left-col">

<label for="gender">Gender</label>

       </div>

       <div class="right-col">

   <select class="form-control" name="gender">

    <option  value="Male">Male</option>

    <option  value="Female">Female</option>

  </select>  

  </div>

</div>

           

  <div class="col-md-6" style="float:left;">

      <div class="left-col">

    <label for="fname">Broker</label>

      </div>

      <div class="right-col">

    <input type="text" class="form-control"  name="broker" id="ticketshow" aria-describedby="broker" placeholder="Broker*" value="" >

  </div>

           </div>

           

     <div class="col-md-6" style="float:left;">

         <div class="left-col">

  <label for="place">Purchase place</label> 

         </div>

        <div class="right-col"> 

     <select class="form-control" name="purchase_place">

    <option value="Attraction Tickets Direct">Attraction Tickets Direct</option>

    <option value="Travel Republic">Travel Republic</option>

    <option value="Expedia">Expedia</option>

    <option value="At The Park">At The Park</option>

  </select>

  </div>

           </div>

  

  <div class="col-md-6" style="float:left;">

      <div class="left-col">

    <label for="fname">Purchase Price</label>

      </div>

      <div class="right-col">

    <input type="text"  class="form-control" placeholder='Price *'  name="price" id="cost" aria-describedby="price" >

  </div>

           </div>

           

  

  <div class="col-md-6" style="float:left;">

      <div class="left-col">

    <label for="fname">Expiration Date</label>

      </div>

      <div class="right-col">

   <input type="date" class="form-control" required  name="date"  id="date" aria-describedby="date" placeholder="Expire Date *">

  </div>

           </div>

<!-- theme park -->
<div class="col-md-6" style="float:left;">         

     <div class="left-col">

  <label for="place">Theme Park*</label> 

     </div>

     <div class="right-col">

     <select class="form-control" name="theme_park_parent_id">

     <?php

      while($theme_park_parent = mysqli_fetch_assoc($theme_park_parents)) {
        $tpp_name=$theme_park_parent['name'];
        $tpp_id = $theme_park_parent['id'];
        $tpp_code = $theme_park_parent['code'];
      ?>

      <option value="<?=$tpp_id?>"><?=$tpp_name?></option>

      <?php
      }
      ?>   
    </select>
    </div>
    </div>

           

 <div class="col-md-6" style="float:left;"> 

     <div class="left-col">

  <label for="place">Active</label> 

     </div>

     <div class="right-col">

     <select class="form-control" name="active">

    <option value="True">true</option>

    <option value="False">false</option>

    

  </select>

  </div>

           </div>

           </div>

  <br>

  

 <div class="col-md-12 text-center small-btn">

 <div class="form-group" style="text-align:center;">

 <button type="submit"  name="submitticket"class="btn btn-primary">Submit</button>

 </div>

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

          <!-- <div class="modal-footer">

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            <a class="btn btn-primary" href="login.html">Logout</a>

          </div>

        </div> -->

      </div>

    </div>



 





  </body>



</html>

