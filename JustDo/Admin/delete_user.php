<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM register_user WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your User is Deleted";
        header("location: add_user.php");
    }else
    {
        $_SESSION['status']="Your User is Not Deleted";
        header("location: add_user.php");
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
