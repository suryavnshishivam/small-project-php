<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connactiondb.php'); 

?>
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
                header("location:add_user.php");
                
            }
            else 
            {
                $_SESSION['status'] = "User Added";
                $_SESSION['status_code'] = "error";
                header("location:add_user.php");
                
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


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h1 class="m-0 font-weight-bold text-primary"> Add User
      <hr>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
            Add User
            </button>
    </h1>
  </div>

  <div class="card-body">
    
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

    <div class="table-responsive">
<?php 

 

        $query="SELECT * FROM  register_user";
       $query_run=mysqli_query($connectiondb,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email Address</th>
            <th>Mobile No</th>
            <th>Adhar No</th>
            <th>Image</th>
            <th>Password</th>
            <th>EDIT</th>
            <th>DELETE</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
         // if (mysqli_num_row($query_run)>0)
          {
            while ($row=mysqli_fetch_assoc($query_run))
            {
              ?>
     
          <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['user_name']; ?> </td>
            <td> <?php echo $row['email_address']; ?> </td>
            <td> <?php echo $row['mobile_no']; ?> </td>
            <td> <?php echo $row['adhar_no']; ?> </td>
            <td>  <img src="user_img/<?php echo $row["image"]; ?>"  witdh="100%" height="80px" alt=""> </td>
            <td> <?php echo $row['password']; ?> </td>
     
            
            
          
            <td>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <a href="edit_user.php?id=<?php echo $row['id']; ?>"> <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button></a>

            </td>


            <td>
            <input type="hidden" name="id" value="<?php echo $row ['id'];?>">
            <a href="delete_user.php?id=<?php echo $row['id']; ?>"> <button  class="btn btn-warning"> DELETE</button></a>
            </td>

          </tr>
          <?php
          } }
          //else{
            //echo "No Record Found";
          
     ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>