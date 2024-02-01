<?php
require_once "dbh.inc.php";
$avis = htmlspecialchars($_POST["avis"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "UPDATE gvp_database.avis SET estValide = 1 WHERE nom=:nom;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom', $avis, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $success_message = 'Avis publié.';
    } else {
        $errors = 'Erreur: ' . $stmt->errorInfo()[2];
    }

    $stmt->execute();
    header("Location: ../admin.php");

} else {
    header("Location: ../index.php");
}