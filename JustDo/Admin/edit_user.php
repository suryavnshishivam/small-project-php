<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
<?php

if(isset($_POST['update_user']))
{

  $id = $_GET['id'];
  $user_name=$_POST['user_name'];
  $email_address=$_POST['email_address'];
  $mobile_no=$_POST['mobile_no'];
  $adhar_no=$_POST['adhar_no'];
  $user_img= $_FILES['image']['name'];
  $path="user_img/".basename($_FILES['image']['name']);
  $password=$_POST['password'];

  if(!empty($_FILES["image"]["name"]))
  {

  $query = "UPDATE `register_user` SET `user_name` = '$user_name', `email_address` = '$email_address' ,`mobile_no`='$mobile_no',`adhar_no`='$adhar_no',`image`='$user_img',`password`='$password' WHERE `id` = '$id' "; 
  }
  else
  {
    $query = "UPDATE `register_user` SET `user_name` = '$user_name', `email_address` = '$email_address' ,`mobile_no`='$mobile_no'
    ,`adhar_no`='$adhar_no',`password`='$password' WHERE `id` = '$id' ";   
  }

 $query_run=mysqli_query($connectiondb,$query); 

 if($query_run)
 {

   
    move_uploaded_file($_FILES['image']['tmp_name'],$path);
     $_SESSION['status'] = "User Updated";
     $_SESSION['status_code'] = "success";
      header('Location:add_user.php');
 }
 else 
 {
     $_SESSION['status'] = "User  not Updated";
     $_SESSION['status_code'] = "error";
     header('Location:add_user.php');
 }
}


?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Edit User
           
    </h1>
  </div>

   <div class="card-body">

  <?php    
  


    $id= $_GET["id"];
    $query="SELECT * FROM register_user WHERE id='{$id}'";
    $query_run=mysqli_query($connectiondb, $query);

    foreach ($query_run as $row )
    {
        ?>
        

            <form action="edit_user.php?id=<?php echo $row["id"];  ?>" method="POST" enctype="multipart/form-data">
            
              
            <div class="form-group">
                <label > Edit User</label>
            </div>

                <div class="form-group">

                  
                 
                    <input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name']; ?>" >
                    <input type="text" name="email_address" class="form-control" value="<?php echo $row['email_address']; ?>"  >
                    <input type="text" name="mobile_no" class="form-control" value="<?php echo $row['mobile_no']; ?>" >
                    <input type="text" name="adhar_no" class="form-control" value="<?php echo $row['adhar_no']; ?>" >
                    <img src="user_img/<?php echo $row["image"]; ?>"  witdh="100%" height="100" alt="">
                    <input type="file" name="image" class="form-control" >
                    <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" >
                   
                   
                </div>
           
           
           


            <a href="add_user.php" class="btn btn-danger" > Cancel</a>
                <button  type="submit"  name="update_user" class="btn btn-primary" > Updated  </button>

                </form>
            <?php
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