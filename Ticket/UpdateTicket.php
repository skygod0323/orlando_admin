<?php

include('../Config/Connection.php');

                // loogin check

                    session_start();

                    $login_check=$_SESSION['id'];

                    //var_dump($data1);

                    if ($login_check!='1') {

                    

                    header("location: ../Login/login.php");

                    }//end

                    //get id

                    $id=$_GET['id'];

                    //end 

                    $sql="SELECT * FROM  ticket where id='$id'";

                    $result=mysqli_query($db,$sql);

                    $user=mysqli_fetch_assoc($result);

                    // Update parameter

                     $base_url=  "http://" . $_SERVER['SERVER_NAME'];

               if(isset($_POST['updateticket']))

                {

                     $ticketshowid=$_POST['ticketshowid'];

                     $name_on_ticket =$_POST['name_on_ticket'];

                     //var_dump($name_on_ticket);die;

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

                     $expire_date=$_POST['date'];

                     $theme_park_id=$_POST['theme_park_id'];

                     $active=$_POST['active'];

                    // end 

                    // Update query

                      $ticket_update = "UPDATE ticket SET

                      ticketshowid='$ticketshowid',

                       ticketshowid='$ticketshowid',

                       name_on_ticket='$name_on_ticket',

                       ticket_type ='$ticketpass',

                      node='$node',

                      trans_number='$trans_no',

                      print_date='$print_date',

                      batch_number='$batchnumber',

                      set_link='$set',

                      entitlement='$entitlement',

                     `type`='$type',

                     `gender`='$gender',

                      broker='$broker',

                      purchased_place='$purchase_place',

                      cost='$price',

                      expire_date='$expire_date',

                      theme_park_id=$theme_park_id,

                      active='$active'

                      WHERE id='$id'";

                      $result1 = mysqli_query($db,$ticket_update);

                    //end query

                      $gust_update ="UPDATE guest SET

                       entitlement ='$entitlement' WHERE ticket_id ='$ticketshowid'";

                       $result2 = mysqli_query($db,$gust_update);

                         if($result ){

                       

                       

                      echo "<script>alert('Updated succesfully');

                      document.location.href='$base_url/app/OrlandoAdmin/Ticket/DetailsTicket.php?active=0';</script>";

                        }

                       

                   // header( "Location: DetailsTicket.php" );

                    }

                    

                    include('../includes/header.php');

                    ?>











