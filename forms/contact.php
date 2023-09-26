<?php

require'path/to/PHPMailer/PHPMailerAutoload.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

  //recuperer les donnees du formulaire

  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];

  //valider les donnees

  if(empty($name)||empty($email)||empty($subject)||empty($message)){
    echo" Veuillez remplir tous les champs du formulaire.";
    exit;
  }

 // configuration de l'adresse e-mail
 $receiving_email_address = 'sanfonemmata@gmail.com';

 // configuration de l'objet du mail
 $objet="Nouveau message de $name";

 //configuratin du corps du mail
 $body="Nom: $name\n";
 $body="E-mail: $email\n";
 $body="Objet: $subject\n";
 $body="Message: $message\n";

 //configurer l'envoi d'e-mail avec PHPMailer

 $mail= new PHPMailer();
 $mail->isSMTP();
 $mail->Host='smtp.gmail.com'; //serveur SMTP
 $mail->Port= 587;
 $mail->SMTPAuth=true;
 $mail->Username= 'sanfonemmata@gmail.com';
 $mail-> Password='Burkindi8';
 $mail->SMTPSecure='tls';
 $mail->setFrom($email,$name);
 $mail->addAdress($receiving_email_address);
 $mail->Objet= $objet;
 $mail->Body= $body;


 
//Envoyer l'e-mail

  if( $mail -> send()) {
    echo" Votre message a été envoyé avec succès.";
  } else {
    echo "Une erreur est survenue lors de l'envoi de votre meessage.Veuillez
    réessayer plus tard.";
  }

} 

?>
