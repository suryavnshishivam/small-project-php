<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php 



    $id = $_GET["id"];

    $query="DELETE  FROM project_post WHERE id='$id'"; 
    $query_run=mysqli_query($connectiondb,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your project_post is Deleted";
      header('Location: project_post_seen.php');
    }else
    {
        $_SESSION['status']="Your project_post is Not Deleted";
        header('Location: project_post_seen.php');
    }


?>


<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>
