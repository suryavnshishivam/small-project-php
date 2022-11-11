<?php
 session_start();
 ob_start();
 $connectiondb=mysqli_connect("localhost","root","","justdo");

if($connectiondb)
{
 //echo "Database Connected";
}
else
{
    header("Location:includes/connaction.php");
}

if(!$_SESSION['user_name'])
{
    header('Location: login.php');
}

?>