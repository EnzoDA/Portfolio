<?php
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = $_POST['email'];
  $to = "enzo@enzodasilvaribeiro.online";
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.hostinger.com'; // Remplacez par votre serveur SMTP
  $mail->SMTPAuth = true;
  $mail->Username = 'enzo@enzodasilvaribeiro.online'; // Remplacez par votre nom d'utilisateur SMTP
  $mail->Password = 'jsp encore!'; // Remplacez par votre mot de passe SMTP
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom($email);
  $mail->addAddress($to);
  $mail->Subject = $subject;
  $mail->Body = $message;

  // Envoyer l'email
if ($mail->send()) 
  {
    header("Location: index.php?success=true");
    exit();
  } 
else 
  {
    $errorMessage = error_get_last()['message'];
    header("Location: index.php?error=mailsend&message=".$errorMessage);
    exit();
  }
}
