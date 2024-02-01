<?php

// Check honeypot
$honeypot = filter_input(INPUT_POST, 'motif', FILTER_SANITIZE_STRING);
if ($honeypot) {
    header($_SERVER['SERVER_PROTOCOL'] . '405 Method Not Allowed');
    exit;
}

// Validation --------------------------------------------------------------------------------------
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$inputs['nom'] = $nom;
if (!$nom || trim($nom) === '') {
    $errors['nom'] = 'Veuillez indiquer votre nom';
}

$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
$inputs['prenom'] = $prenom;
if (!$prenom || trim($prenom) === '') {
    $errors['prenom'] = 'Veuillez indiquer votre prénom';
}

$telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
$inputs['telephone'] = $telephone;
if (!$telephone || trim($telephone) === '') {
    $errors['telephone'] = 'Veuillez indiquer votre numéro de téléphone';
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!$email) {
        $errors['email'] = 'Adresse e-mail invalide';
    }
} else {
    $errors['email'] = 'Veuillez indiquer votre adresse e-mail';
}

$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$inputs['message'] = $message;
if (!$message || trim($message) === '') {
    $errors['message'] = 'Veuillez écrire votre message';
}