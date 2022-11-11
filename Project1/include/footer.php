<?php 

require_once("include/connaction.php"); 
?> <?php

$result_address_footer=$connectiondb->query("SELECT *  FROM address_footer");
$Service_post=$connectiondb->query("SELECT *  FROM service");
$header_pages=$connectiondb->query("SELECT *  FROM tbl_menu where visibility_status=0 order by position_order ASC");
?>

       <!-- JavaScript Libraries -->
       <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src=".//lib/easing/easing.min.js"></script>
    <script src=".//lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/isotope/isotope.pkgd.min.js"></script>
    <script src="../lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
            <?php
                    while ($lll = mysqli_fetch_assoc($result_address_footer)) {
                    ?> 
                <div class="col-lg-4 col-md-6">
                    
                    <h4 class="text-light mb-4"><?php echo $lll['title']; ?></h4>
                    
                    <p class="mb-2" > <i class="fa fa-map-marker-alt me-3"></i><?php echo $lll['address']; ?></p>
                    <p class="mb-2"> <i class="fa fa-phone-alt me-3"></i><?php echo $lll['landline_no']; ?></p>
                    <p class="mb-2"> <i class="fa fa-envelope me-3"></i><?php echo $lll['email']; ?></p>
                    <?php } ?>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <?php
                    while ($qqq = mysqli_fetch_assoc($Service_post)) {
                    ?> 
                    <a class="btn btn-link" href="<?php echo $qqq['link']; ?>"><?php echo $qqq['title']; }?></a>
                  </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <?php
                    while ($xxx = mysqli_fetch_assoc($header_pages)) {
                    ?> 
                    <a class="btn btn-link" href="<?php echo $xxx['page_link']; ?>"><?php echo $xxx['page_name']; }?></a>
                   
                </div>
               
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.php">Woody</a>, All Right Reserved.
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>
    
    </body>

</html>