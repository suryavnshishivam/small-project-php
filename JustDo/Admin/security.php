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
    header("Location: dbconfig.php");
}

if(!$_SESSION['name'])
{
    header('Location: login.php');
}

?>