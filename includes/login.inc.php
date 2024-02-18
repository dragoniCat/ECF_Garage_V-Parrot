<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $errors = [];

    if ($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!$email) {
            $errors['email'] = 'Adresse e-mail invalide';
        }
    } else {
        $errors['email'] = 'Veuillez entrer votre adresse e-mail';
    }

    if (!$mdp) {
        $errors['mdp'] = 'Veuillez entrer un mot de passe';
    }

    if ($errors) {
        $_SESSION["loginError"] = $errors;
        header("Location: ../login.php");

    } else try {
        
        require_once 'dbh.inc.php';
        require_once 'config.php';
        require_once 'login_model.php';
        $user = get_email($email);

        // SUCCES
        if ($user["mdp"] == $mdp) {
            session_regenerate_id();
    
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["userID"]  = $user["id"];
            $_SESSION["user_prenom"] = $user["prenom"];

            if ($user["id"] == 1) {
                header("Location: ./admin.php");
            } else {
                header("Location: ./employe.php");
            }
        } else {
            $errors['login'] = 'E-mail ou mot de passe incorrect.';
            $_SESSION["loginError"] = $errors;
            header("Location: ./login.php");
        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}