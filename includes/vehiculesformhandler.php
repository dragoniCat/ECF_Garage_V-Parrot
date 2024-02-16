<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    $voitureNom = htmlspecialchars($_POST["voiture-nom"]);
    $prix = ($_POST["prix"]);
    $annee = htmlspecialchars($_POST["annee"]);
    $kilometrage = htmlspecialchars($_POST["kilometrage"]);
    $carburant = htmlspecialchars($_POST["carburant"]);

    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($_FILES["voiture-image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["voiture-image"]["tmp_name"]);

    try {
        //Check image
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $errors['image'] = 'Le fichier doit être une image.';
            $uploadOk = 0;
        }

        //Limite types de fichiers
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $errors['filetype'] = 'Seulement les JPG, JPEG or PNG sont autorisés.';
            $uploadOk = 0;
        }

        //Upload si pas d'erreurs
        if($uploadOk == 0) {
            header("Location: ../admin.php");
            exit();
        } else {
            if(move_uploaded_file($_FILES["voiture-image"]["tmp_name"], $target_file)) {
                $_SESSION['success_message'] = 
                    "L'image " . htmlspecialchars( basename( $_FILES["voiture-image"]["name"])) 
                    . " a été téléchargée.";
            } else {
                $errors['upload'] = "Une erreur est survenue lors du téléchargement de l'image.";
            }
        }

        $imageVoiture = htmlspecialchars( basename( $_FILES["voiture-image"]["name"]));
        require_once "dbh.inc.php";

        $query = 
            "INSERT INTO '".$database."'.vehicule (nom, prix, annee, kilometrage, carburant, image) 
            VALUES (?, ?, ?, ?, ?, ?); 
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$voitureNom, $prix, $annee, $kilometrage, $carburant, $imageVoiture]);

        $pdo = null;
        $stmt = null;

        header("Location: ../admin.php");

        exit();

    } catch (PDOException $e) {
        die("Echec de la connexion: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}