<?php

    namespace EnvoieMailMetier;
    use EnvoieMailMetier\I_EnvoieMail;
    require_once(__DIR__."/I_EnvoieMail.php");
    require __DIR__.'/../Bibliotheques/PhpMailer/src/PHPMailer.php';
    require __DIR__.'/../Bibliotheques/PhpMailer/src/SMTP.php';
    require __DIR__.'/../Bibliotheques/PhpMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
   


    class EnvoieMail implements I_EnvoieMail
    {

        public function EnvoieMail(array $donnees)
        {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            
            //Configuration du serveur Mail
            $mail->Host       = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
            $mail->SMTPAuth   = true;
            $mail->Username   = 'noreply.elieu@gmail.com'; // Votre adresse email
            $mail->Password   = 'bjuljtpkojebyojj'; // Votre mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Configuration du Mail
            $mail->setFrom('noreply.elieu@gmail.com');
            $mail->addAddress($donnees['AdresseEmailDestinataire']); // Email du destinataire
            $mail->Subject = $donnees['ObjetMail'];
            $mail->Body    = $donnees['CorpsMail'];
            $mail->addAttachment($donnees['PieceJointe']);

            //Envoie du mail
            $mail->send();
            
        }

    }