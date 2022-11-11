<?php 

include("include/connaction.php");
include("include/header.php");

?>



<?php
$result_contact=$connectiondb->query("SELECT *  FROM contact_footer");
?>






    <!-- Page Header Start -->
    <div class="container-fluid page-header1 py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
            <?php




if (isset($_POST['submit']))
 {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')"; 
    $query_run = mysqli_query($connectiondb, $sql);
}


?>   
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <?php
                    while ($ccc = mysqli_fetch_assoc($result_contact)) {
                    ?> 
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?php echo $ccc['title']; ?></h1>
                        </div>
                        <p class="mb-4"><?php echo $ccc['heading']; ?></p>
                        <?php } ?>
                            <form action="contact.php" method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="message" class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="submit" >Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29920.787551039353!2d72.88524847798762!3d20.378830526643235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0cf764c5c6dd1%3A0x65fac0c9ffaedbd6!2z4KS44KWN4KSf4KS-4KSwIOCkrOCkv-CksuCljeCkoeCksOCljeCkuA!5e0!3m2!1shi!2sin!4v1653975697512!5m2!1shi!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <?php 
include("include/script.php");
include("include/footer.php");

?>
