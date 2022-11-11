<?php
    // getting data of form on index.php
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $message=$_POST["message"];

    $to="suryavnshishivam.000@gmail.com";
    $subject="Mail From Ubsoftec";
    $txt="name =". $name . "\r\n email =" . $email ."\r\n phone =" . $phone . "\r\n message =" . $message;

    $headers= "From : noreply@rohan.com" . "\r\n" ."CC: sombodyelse@example.com";

    if($email != NULL)
    {
        mail($to,$subject,$txt,$headers);
    }
    header("Location : index.php");
?>