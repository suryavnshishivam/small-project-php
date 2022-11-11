<?php include('includes/connaction.php'); ?>


<?php
if (isset($_POST["submit"]))
{

  
    $user_name=$_POST['user_name'];
    $email_address=$_POST['email_address'];
    $mobile_no=$_POST['mobile_no'];
    $adhar_no=$_POST['adhar_no'];
    $user_img= $_FILES['image']['name'];
    $path="user_img/".basename($_FILES['image']['name']);
    $password=$_POST['password'];
    
    
    
   $sql="INSERT INTO `register_user` (`user_name`,`email_address`,`mobile_no`,`adhar_no`,`image`,`password`) 
   VALUES ('$user_name','$email_address','$mobile_no','$adhar_no','$user_img','$password')";
    $query_run = mysqli_query($connectiondb,$sql); 

  
            if($query_run)
            {
              move_uploaded_file($_FILES['image']['tmp_name'],$path);
                $_SESSION['status'] = "User Added";
                $_SESSION['status_code'] = "success";
                header("location:login.php");
                
            }
            else 
            {
                $_SESSION['status'] = "User Added";
                $_SESSION['status_code'] = "error";
                header("location:login.php");
                
            }
        }

      


?>


<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="add_user.php" method="POST" enctype="multipart/form-data"> 

        <div class="modal-body">

        <div class="form-group">
      
                    <input type="text" name="user_name" class="form-control" placeholder="Enter name" required >
                    <input type="text" name="email_address" class="form-control" placeholder="Enter Email Address" required >
                    <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No" required>
                    <input type="text" name="adhar_no" class="form-control" placeholder="Enter AdharNo" required>
                    <input type="file" name="image" class="form-control" required >
                    <input type="text" name="password" class="form-control" placeholder="Enter Password" required >
                   
                    
                </div>
            </div>
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>


    </div>
  </div>
</div>


    <?php
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
        }
        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
        }
    
?>

