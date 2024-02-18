<?php
require_once "dbh.inc.php";
$avisPublique = htmlspecialchars($_POST["avisPublique"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = "UPDATE ".$DATABASE.".avis SET estValide = 0 WHERE nom=:nom;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nom', $avisPublique, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $success_message = 'Avis retiré.';
    } else {
        $errors = 'Erreur: ' . $stmt->errorInfo()[2];
    }

    $stmt->execute();
    header("Location: ../admin.php");

} else {
    header("Location: ../index.php");
}