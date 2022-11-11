<?php

$connection=mysqli_connect("localhost","root","","banner");

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email']; 
    $password_login = $_POST['password']; 

      $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' LIMIT 1"; 
     $query_run = mysqli_query($connection, $query); 

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        Redirect_to('banner.php');
   } 
   else
   {
        $_SESSION['status'] = "Email / Password is Invalid";
        Redirect_to('banner.php');
   }
    
}


// require('security.php');

// $connection =mysqli_connect("localhost","root","","banner");

// if (isset($_POST['login_btn']))
// {
//     $email_login=$_POST['email'];
//     $password_login=$_POST['password'];

//     $query="SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
//     $query_run=mysqli_query($connection,$query);
//     $usertype=mysqli_fetch_array($query_run);

//     if ($usertype['usertype']=="admin")
//     {
//         $_SESSION['username']= $email_login;
//         header('Location: register.php');
//     }
//     else if ($usertype['usertpe']=="user")
//     {
//         $_SESSION['username']= $email_login;
//         header('Location: ../register.php'); 
//     }else
//     {
//         $_SESSION['status']= "Email/Password Is Invalid";
//         header('Location: login.php');
//     }
// }






?>

<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
              </div>
                <form class="user" action="Dashboard.php" method="POST">

                    <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>