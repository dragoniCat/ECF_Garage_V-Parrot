<?php
require_once "dbh.inc.php";
$offre = htmlspecialchars($_POST["offre"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "DELETE FROM '".$database."'.vehicule WHERE nom=:nom;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom', $offre, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $success_message = 'Offre supprimée.';
    } else {
        $errors = 'Erreur survenue lors de la suppression: ' . $stmt->errorInfo()[2];
    }

    $stmt->execute();
    header("Location: ../admin.php");

} else {
    header("Location: ../index.php");
}