<?php

require "vendor/autoload.php";

$robo = 'robot@example.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    }


    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'piweather182@gmail.com';
    $mailer->Password = 'Piweather@182';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    $mailer->setFrom('piweather192@gmail.com', 'Pi Weather');
    $mailer->addAddress($emailsendto, 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'PI WEATHER';
    $mailer->Body = 'Thank You For Contacting <b> PI WEATHER </b> We will Contact you soon... ';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}