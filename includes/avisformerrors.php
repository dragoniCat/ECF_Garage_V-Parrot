<?php

// Check honeypot
$honeypot = filter_input(INPUT_POST, 'motif', FILTER_SANITIZE_STRING);
if ($honeypot) {
    header($_SERVER['SERVER_PROTOCOL'] . '405 Method Not Allowed');
    exit;
}

// Erreurs
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$inputs['nom'] = $nom;
if (!$nom || trim($nom) === '') {
    $errors['nom'] = 'Veuillez indiquer votre nom';
}

$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$inputs['message'] = $message;
if (!$message || trim($message) === '') {
    $errors['message'] = 'Veuillez écrire un message'; 
}