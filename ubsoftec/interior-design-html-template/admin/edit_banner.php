<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('function.php');



if (isset($_POST['edit_banner_btn']))
{
    $id= $_POST['edit_banner_id'];
    $query="SELECT * FROM banner1 WHERE id='$id'";
    $query_run=mysqli_query($connection, $query);


}



if(isset($_POST['update_banner_btn']))
{
 $id = $_POST['edit_banner_id'];
 $Image=$_POST['edit_banner_btn'];

 
$query = "UPDATE banner1 SET image='$Image' WHERE id= $id ";
$query_run=mysqli_query($connection,$query);

if ($query_run)
{
        $_SESSION['success']="Your Banner is Updated";
        //Redirect_to('banner.php');
}else
{
    $_SESSION['status']="Your Banner is Not Updated";
    //Redirect_to('banner.php');
}

}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Banner 
           
    </h6>
  </div>

  <div class="card-body">
  <?php    
    $connection= mysqli_connect("localhost","root","","banner");
  if (isset($_POST['edit_banner_btn']))
{
    $id= $_POST['edit_banner_id'];
    $query="SELECT * FROM banner1 WHERE id='$id'";
    $query_run=mysqli_query($connection, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_banner.php" method="POST">
            <input type="hidden" name="edit_banner_id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <label > Banner</label>
            </div>

                <div class="form-group">
                    <input type="file" name="edit_banner_btn" class="from-control p-1" required>
                </div>
           
           
            <div class="form-group">
                <label>UserType</label>
                <select name="update_usertype" class="form-control" >
                <option value="admin">Admin</option>
                <option value="user">user</option>
                </select>
            </div>



            <a href="banner.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_banner_btn" class="btn btn-primary" > Updated  </button>

                </form>
            <?php
    }    

}
?>     

  </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
//include('includes/footer.php');
?>