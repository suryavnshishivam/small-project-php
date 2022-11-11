<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorication,X-Request-With');

error_reporting(0);

$data=json_decode(file_get_contents("php://input"));
include ('db.php');

if ($data->id){

    $query="DELETE FROM products WHERE id=".$data->id;

     $run=mysqli_query($db,$query);
     if ($run)
     {
        echo json_encode(['status'=>'success','msg'=>'Product Deleted']);
    }   else {
        echo json_encode(['status'=>'failed','msg'=>'Product Not Deleted ']);
     }   
   
    } else {
      echo json_encode(['status'=>'failed','msg'=>'Product Id Is Not Given ']);
}

?>