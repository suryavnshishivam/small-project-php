
<?php

$connection = mysqli_connect("localhost", "root", "", "banner");
function make_query($connection)
{
 $query = "SELECT * FROM banner ";
 $result = mysqli_query($connection, $query);
 return $result;
}

function make_slide_indicators($connection)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connection);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connection)
{
 $output = '';
 $count = 0;
 $result = make_query($connection);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  
  $output .= '
   <img src="'.$row["image"].'"  width = "100%" height="50px" />
   <div class="carousel-caption">
    
   </div>
  </div>
  '; 
  $count = $count + 1;
 }
 return $output;
} 


?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Make Dynamic Bootstrap Carousel with PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
      <!--navbar-->
   <!-- <div style="height: 10px; background: rgb(105, 228, 23);"> </div>
   <nav  class="navbar navbar-expand-lg navbar-Dark  bg-Success">
<div class="container">
    <a href="#" class="navbar-brand "> The Co-Operative Food </a>
    <button class="navbar-toggler" data-toggler="collapse" data-target="#navbarcollapseBoost">
        <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="navbarcollapseBoost"> 
    <ul class="navbar-nav mr-auto"> 
        
           
                <li class="nav-item">
                    <a href="#" class="nav-link" >Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Iteams</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">About Us</a>
                            </li>
                            
                               

    </ul>
    <ul class="navbar-nav ml-auto">  
        <li class="nav-item"><a href="Logout.php" class="nav-link text-danger "> 
            <i class="fa-solid fa-user-times bg-dark " ></i>Logout</a></li>
    </ul>

</div>
</div>    

</nav>
<div style="height: 10px; background: rgb(105, 228, 23);"> </div>   -->
<!--navbar end -->
 
  <!-- <br />
  <div class="container">
   <h2 align="center">Tech Slide</h2>
   <br /> -->
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($connection); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($connection); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

    

   </div>
  </div>
 </body>
</html>

