<?php
/**
 * Created by PhpStorm.
 * User: WorldWiki
 * Date: 04-04-2017
 * Time: 11:39 AM
 */
function mailme($to,$from,$fromName,$subject,$rplyTo,$rplyName,$body)
{
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';                               // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';//'smtp.zoho.com';
    // Specify main and backup SMTP servers
    $mail->Port=465;//'587';

    // Enable SMTP authentication
    $mail->Username = 'ravdeeps3@gmail.com';//'info@technicus.in';                 // SMTP username
    $mail->Password = 'chandeep12';//'shubham@123';
    // SMTP password
    // Enable encryption, 'ssl' also accepted

    $mail->From = $from;
    $mail->FromName = $fromName;
    // Add a recipient
    $mail->addAddress($to);               // Name is optional
    $mail->addReplyTo($rplyTo,$rplyName);


    $mail->WordWrap = 100;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $body;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //echo "sent";
        //  header('location:manage_student.php');
    }
}