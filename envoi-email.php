<?php
require 'vendor/autoload.php'; // Inclure le fichier autoload.php généré par Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $to = "enzodasilvaribeiro@gmail.com";
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Créer une nouvelle instance de PHPMailer
 

  try {
    // Configuration des paramètres de messagerie
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'enzo@enzodasilvaribeiro.online';
    $mail->Password = 'Barcelone2015!';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    // Composer le message
    $mail->setFrom($email);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Envoyer l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès !';
  } catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
  }
}
?>
