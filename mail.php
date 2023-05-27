<?php

require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.smtp.php';
require 'phpmailer/class.phpmailer.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sub = $_POST['subject'];
    $msg = $_POST['textarea'];

    $body = " <div style='width: 50%; border:1px solid black; margin:0; padding: 0;'>
            <div style='padding: 5px 0; letter-spacing: 1px; background-color: lightblue; text-align:center; font-size: 16px;'>
            <h1>Call Back</h1>
            </div>
            <div style='letter-spacing: .75px; padding: 2%; font-size: 17px;'>
            <p><b>Name: </b>$name</p>
            <p><b>Email: </b>$email</p>
            <p><b>Phone No: : </b>$phone</p>
            <p><b>Subject: </b>$sub</p>
            <p><b>Your Message: </b>$msg</p>
            </div>
        </div>";


    $mail = new PHPMailer;

    //$mail->isSMTP();                                      // Set mailer to use SMTP
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'donotreply@anyawebsolution.in';                 // SMTP username
    $mail->Password = 'Up81h8910anyawebsolution';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('donotreply@anyawebsolution.in', 'Header');
    $mail->addAddress('yashsharmadelhi01@gmail.com');  // Name is optional

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = "Call Back Request";
    $mail->Body    = $body;

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("Location: thankyou.html");
        echo 'Mail has been send.';
    }
}
