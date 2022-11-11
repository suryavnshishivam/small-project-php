<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
//  include('function.php');

if (isset($_POST["submit"]))
{

    $image= $_FILES['image']['name'];
    $path="pictures/".basename($_FILES['image']['name']);
    
    $sql="INSERT INTO banner1 (image) VALUES ('$path')";
    $query_run = $connection->query($sql); 

    move_uploaded_file($_FILES['image']['tmp_name'],$path);
    

            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Banner Added";
                $_SESSION['status_code'] = "success";
                
            }
            else 
            {
                $_SESSION['status'] = "Banner Not Added";
                $_SESSION['status_code'] = "error";
                
            }
        }

      

if(isset($_POST['delete_banner_btn']))
{
    $id = $_POST['delete_id'];

    $query="DELETE  FROM banner1 WHERE id='$id'";
    $query_run=mysqli_query($connection,$query); 

    if ($query_run)
    {
      $_SESSION['status']="Your Banner is Deleted";
      
    }else
    {
        $_SESSION['status']="Your Banner is Not Deleted";
        
    }
}
  
?>


<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Banner </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="banner.php" method="POST" enctype="multipart/form-data"> 

        <div class="modal-body">

        <div class="form-group">
                    <input type="file" name="image" class="from-control p-1" required>
                </div>
            
            
            <input type="hidden" name="usertype" value="admin">
        
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
    <h6 class="m-0 font-weight-bold text-primary"> Add Bannerr
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image">
              Add Imagee
            </button>
    </h6>
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
 echo  $connection = mysqli_connect("localhost","root","","banner1");die();
 

        $query="SELECT * FROM  banner1";
       $query_run=mysqli_query($connection,$query);

?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID</th>
            <th> Image </th>
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
            <td> <?php echo $row['image']; ?> </td>
           
          
            <td>
                <form action="edit_banner.php" method="POST">
                    <input type="hidden" name="edit_banner_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_banner_btn" class="btn btn-success"> Edit Banner</button>
                </form>
            </td>
            <td>
                <form action="banner.php" method="POST">
                  <input type="hidden" name="delete_id" value="<?php echo $row ['id'];?>">
                  <button type="submit" name="delete_banner_btn" class="btn btn-danger"> Delete Banner</button>
                </form>
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