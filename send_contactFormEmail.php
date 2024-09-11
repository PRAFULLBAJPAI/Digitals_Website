<?php
use PHPMailer\src\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
//require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit_Contact'])) {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                     
        $mail->Host = 'smtp.gmail.com';   
        $mail->SMTPAuth = true;             
        $mail->Username = 'ritikbajpai1976@gmail.com';  
        $mail->Password = 'lloxiaaoqhltpzzm';  
        $mail->SMTPSecure = 'tls';          
        $mail->Port = 587;                  

        // Recipients
        $mail->setFrom('ritikbajpai1976@gmail.com', 'Contact Form');
        $mail->addAddress('prafullbajpai123@gmail.com'); 

        // Content
        $mail->isHTML(true);                  
        $mail->Subject = "Contact Form Submission";
        $mail->Body    = "You have received a new message from the contact form.<br><br>"
                       . "Name: $name<br>"
                       . "Phone: $phone<br>"
                       . "Email: $email<br>"
                       . "Message:<br>$message";
                       
        $mail->send();
        echo '<script>window.location.href = window.location.href; 
        alert("suceessful submit")</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
