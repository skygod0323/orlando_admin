<?php
  include('../Config/Connection.php');
$gid = $_REQUEST['gid'];
$moblie_no=$_REQUEST['moblie_no'];
$login_id = $_REQUEST['login_id'];
$name=$_REQUEST['name'];
$order_id=$_REQUEST['order_id'];
$type=$_REQUEST['type'];
if($name==null)
{
    echo json_encode(array('Status'=>1,'message'=>'Field can not be blank',));
    exit();
 }

$insert_users = "INSERT INTO screenshot(gid,moblie_no,login_id,name,order_id,type)VALUES('$gid','$moblie_no','$login_id','$name','$order_id','$type')";

$result =$db->query($insert_users);
//$id =$conn->insert_id;



if($result)
{
    
   echo json_encode(array('status'=>1,'message'=>'added successfully.'));
   exit();
}
else
{
   echo json_encode(array('status'=>1,'message'=>'adding failed'));
   exit();
}

?>