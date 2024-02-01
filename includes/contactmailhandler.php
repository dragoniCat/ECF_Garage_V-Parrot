<?php

// Reccupère adresse
$config = require_once __DIR__ . '/config.php';
$receveur_email = $config['mail']['to_email'];

// Information de contact
$contact_nom = $inputs['nom'];
$contact_email = $inputs['email'];
$message = $inputs['message'];

if ($aProposOffre) {
    $sujet = $vehicule['nom'];
} else {
    $sujet = 'Prise de contact Garage V. Parrot';
}

//  Email header
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=utf-8";
$headers[] = "To: $receveur_email";
$headers[] = "From: $contact_email";
$header = implode("\r\n", $headers);

mail($receveur_email, $sujet, $message, $header);