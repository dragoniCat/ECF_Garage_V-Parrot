<?php

$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {

    // Afficher message
    if (isset($_SESSION['success_message'])) {
        $success_message = $_SESSION['success_message'];
        unset($_SESSION['success_message']);
    } elseif (isset($_SESSION['inputs']) && isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
        $inputs = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }
    // Form
    require_once('./components/forms/contact-form.php');
} elseif ($request_method === 'POST') {
    // Honeypot et validation
    require_once __DIR__ . '\contactposthandler.php';

    if (!$errors) {
        // Envoie l'e-mail
        require_once __DIR__ . '\contactmailhandler.php';
        // Message
        $_SESSION['success_message'] =  
            'Merci de nous avoir contacté! Nous répondrons aussitôt que possible.';
    } else {
        $_SESSION['errors'] =   $errors;
        $_SESSION['inputs'] =   $inputs;
    }

    header('Location: ../index.php#contact', true, 303);
    exit;
}