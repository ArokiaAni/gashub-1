<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/plain');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../database/db.php';
if(isset($_POST['id']))
{
$id=$_POST['id'];
$weight=$_POST['weight'];
$type=$_POST['type'];
$status=$_POST['status'];
$createdby="1";
if(!empty($weight) && !empty($type) &&
!empty($status)){ 
    $sql=pg_query($db,"UPDATE cylinderweight SET weight='$weight',status='$status',createdby='$createdby' WHERE id='$id'");
    if($sql)
    {
       $sql=pg_query($db,"UPDATE cylindertype SET type='$type',status='$status',createdby='$createdby' WHERE id='$id'");
        http_response_code(201);         
        echo json_encode(array("message" => "Successfull"));
      
    }

    }else{
        http_response_code(503);        
        echo json_encode(array("message" => "Error"));
    
}
}else{
    http_response_code(400);    
    echo json_encode(array("message" => "Error Please Check."));
}

?>