<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';


function send_verification($fullname, $email, $message){

    $mail = new PHPMailer(true);

    try {

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'francisco.armas.cics@ust.edu.ph'; // Your Gmail
        $mail->Password   = 'bydg jojy nqyh ilbz'; // Your App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('francisco.armas.cics@ust.edu.ph', 'Grand Budapest');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Inquiry Submitted";
        $mail->Body    = '<h3 style="color: #004aad; margin-bottom: 20px;">Hello, '.$fullname.'</h3>
<p>Thank you for sending an inquiry at <strong>Grand Budapest</strong>.</p>
<p style="margin-top: 20px;">Below is the message that you have sent:</p>
<div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; text-align: center; font-size: 24px; color: #004aad; font-weight: bold;">
        '.$message.' </div>
<p style="margin-top: 20px;">Rest assured that we have received your message and that we will reply at least after 24 hours.</p>
<p style="margin-top:10px;font-size: 14px; color: #6c757d;">— Grand Budapest Team</p>';;


        $mail->send();

        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Form successfully sent. Please check your email for updates.',
                confirmButtonText: 'OK'
            });
        </script>
        ";
        

    } catch (Exception $e) {

        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Email Failed!',
                text: 'Message could not be sent.',
                footer: '".$mail->ErrorInfo."'
            });
        </script>
        ";
    }
}
?>