<?php
$errors = [];
$inputs = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['star-5'])) {
        $note = 5;
    } else if (isset($_POST['star-4'])) {
        $note = 4;
    } else if (isset($_POST['star-3'])) {
        $note = 3;
    } else if (isset($_POST['star-2'])) {
        $note = 2;
    } else if (isset($_POST['star-1'])) {
        $note = 1;
    } else {
        $note = 0;
    }

    $nom = htmlspecialchars($_POST["nom"]);
    $message = htmlspecialchars($_POST["message"]);

    try {
        require_once __DIR__ . '\avisformerrors.php';

        if (!$errors) {
            require_once "dbh.inc.php";

            $query = 
            "INSERT INTO '".$database."'.avis (nom, note, message) 
            VALUES (?, ?, ?);";

            $stmt = $pdo->prepare($query);
            $stmt->execute([$nom, $note, $message]);
            $stmt->closeCursor();
            
            // Message
            $_SESSION['success_message'] =  
                'Merci de votre retour!';
        } else {
            $_SESSION['errors'] =   $errors;
            $_SESSION['inputs'] =   $inputs;
        }

        header('Location: ../laisser-un-avis.php', true, 303);
        exit;

    } catch (PDOException $e) {
        die("Echec de la connexion: " . $e->getMessage());
    }

} else {
    header("Location: ../laisser-un-avis.php");
}