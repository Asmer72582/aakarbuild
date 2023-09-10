<?php 


// refference 
$userName = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['msg'];


// mail direction
$to = "info@aakaarbuildility.com";
$body = "";
$title = $subject;


// mail format
$body .= "From: ".$userName. "\r\n";
$body .= "Email: ".$email. "\r\n";
$body .= "Message: ".$message. "\r\n";

// mailing section
mail($to, $title, $body);


// redirect the page
echo "<script>window.location.href = 'contact.php';</script>";


?>