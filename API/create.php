<?php 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorication,X-Request-With');

error_reporting(0);

$data=json_decode(file_get_contents("php://input"));
include ('db.php');

if ($data->discount=='')
{
    echo json_encode(['status'=>'failed','msg'=>'Discount Not Provided !']);
        
}elseif ($data->product_name =='')
{
    echo json_encode(['status'=>'failed','msg'=>'Product Name Not Provided !']);
        
}elseif ($data->product_price =='')
{
    echo json_encode(['status'=>'failed','msg'=>'Product Price Not Provided !']);
        
}elseif ($data->stock =='')
{
    echo json_encode(['status'=>'failed','msg'=>'Stock Not Provided !']);
        
}
else
{
    $query="INSERT INTO products (product_name,product_price,stock,discount)";
    $query.="VALUES('$data->product_name',$data->product_price,$data->stock,$data->discount)";
    $run=mysqli_query($db,$query);
    if ($run)
{
    echo json_encode(['status'=>'success','msg'=>'Product Added !']);

}   else 

{
    echo json_encode(['status'=>'failed','msg'=>'Product Not Added !']);
}

}





?>