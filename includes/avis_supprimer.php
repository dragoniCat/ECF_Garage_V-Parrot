<?php
require_once "dbh.inc.php";
$avis = htmlspecialchars($_POST["avis"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "DELETE FROM '".$database."'.avis WHERE nom=:nom;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom', $avis, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $success_message = 'Avis supprimé.';
    } else {
        $errors = 'Erreur: ' . $stmt->errorInfo()[2];
    }

    $stmt->execute();
    header("Location: ../admin.php");

} else {
    header("Location: ../index.php");
}