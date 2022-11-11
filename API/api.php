<?php
$conn =mysqli_connect("localhost","root","","API_DATA");
$responce = array();
if ($conn){
    $sql = "select * from data";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header("content-type: JSON");
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $responce[$i]['id']=$row ['id'];
            $responce[$i]['name']=$row ['name'];
            $responce[$i]['age']=$row ['age'];
            $responce[$i]['email']=$row ['email'];
            $i++;
        }
        echo json_encode($responce,JSON_PRETTY_PRINT);
    }
}
else {
    echo "DataBase connection failed";
}


?>