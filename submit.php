
<?php

    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $skills = $_POST['skills'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $inr = $_POST['inr'];
    $exp = $_POST['exp'];
    $dob = $_POST['dob'];
    $message = $_POST['message'];
    
    $message ="Name = ". $name ."\r\n  Email = " . $email . "\r\n Message =" . $message ."\r\n Skills =" . $skills ."\r\n Date of Birth =" . $dob ."\r\n phone number =" . $phone;  
             
             
    $subject ='Request Submitted by '.$name;
    $fromname = $email;
    $fromemail = 'noreply@codeconia.com';  //if u dont have an email create one on your cpanel
    $mailto = 'info@aakaarbuildility.com';  //the email which u want to recv this email
    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));
    // a random hash will be necessary to send mixed content
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail send ... OK"; // do what you want after sending the email
        echo "<script>window.location = 'career.php'</script>";
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
    

    

// echo "<h2>Person's Contact Detail!</h2>
//     <p><b>Name:</b> '.$name.'</p>
//     <p><b>Email:</b> '.$email.'</p>
//     <p><b>date of birth:</b> '.$dob.'</p>
//     <p><b>phone no:</b> '.$phone.'</p>
//     <p><b>Current ctc:</b> '.$inr.'</p>
//     <p><b>skills :</b> '.$skills.'</p>
//     <p><b>Exprience:</b> '.$exp.'</p>
//     <p><b>image:</b> '.$fileName.'</p>
//     <p><b>Message:</b> '.$message.'</p>";
?>