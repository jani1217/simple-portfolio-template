<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$title = "New message";
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$subject = "New Message";
$body = "Name: $name\nEmail: $email\nMessage:\n$message";

$mail = new PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth = true;

  $mail->Host       = 'smtp.gmail.com';
  $mail->Username   = 'muthuyy11@gmail.com';
  $mail->Password   = 'nbdt xiyv iwle diqk'; // Replace with your 16-character app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;

  $mail->setFrom('muthuyy11@gmail.com', $title);
  $mail->addAddress('muthuyy11@gmail.com');

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = nl2br($body); // convert \n to <br> if needed for HTML

  $mail->send();
  http_response_code(200);
  echo "Message sent successfully!";
} catch (Exception $e) {
  http_response_code(500);
  echo "Failed to send the message. Error: " . $mail->ErrorInfo;
}
