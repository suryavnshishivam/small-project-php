<?php 
require_once("include/connaction.php"); 
?> 
<?php

$result_header=$connectiondb->query("SELECT *  FROM header");
$result_tab_menu=$connectiondb->query("SELECT *  FROM tbl_menu");
$result_header_img=$connectiondb->query("SELECT *  FROM header_nav");
?>
<?php 
	
		{
			$page_status="true";
			$path="../";
		}
	?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>START - BUILDCON </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="https://technext.github.io/woody/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&amp;family=Roboto:wght@500;700;900&amp;display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
 
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div  style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
        <?php
                    while ($fff = mysqli_fetch_assoc($result_header)) {
                    ?> 
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small><?php echo $fff['address']; ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small><?php echo $fff['time']; ?></small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small><?php echo $fff['mobile']; ?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- Topbar End -->


     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <?php
                    while ($qqq = mysqli_fetch_assoc($result_header_img)) {
                    ?> 
            <img src="admin/header_img/<?= $qqq['image']; ?>" alt="" height="150px" width="100%">
        </a>
        <?php }?>
      
                            
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto  p-4 p-lg-0">
        <ul class="list-inline" id="portfolio-flters">
            
           
				<?php
                   
						$qry="SELECT * FROM tbl_menu where visibility_status=0 order by position_order ASC";				 
							$result=mysqli_query($connectiondb,$qry); 
                    
							 while($row=mysqli_fetch_array($result))
							 {
							?>
                            
                         <li ><a class="nav-item nav-link" href="<?php if($page_status=='true')?> <?php echo $row['page_link'];?>"><?php echo $row['page_name'];?></a></li>
                         
                            
                        <?php } ?>  
                        </ul>   
				</div>	
        </div>
    </nav>

    <!-- Navbar End -->
