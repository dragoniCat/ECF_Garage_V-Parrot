<?php
try {
    require_once "dbh.inc.php";

    $query = "SELECT * FROM ".$DATABASE.".vehicule;";
    $stmt = db()->prepare($query);
    $stmt->execute();

    $vehicules = array();
    while ($vehicule = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $vehicules[] = $vehicule;
    }

    // Kilométrage ---------------------------------------------------------------------------------

    $maxKmQuery = "SELECT MAX(kilometrage) FROM ".$DATABASE.".vehicule;";
    $maxKmStmt = db()->prepare($maxKmQuery);
    $maxKmStmt->execute();

    $maxKm = $maxKmStmt->fetchColumn();
    $maxKm = (int)$maxKm;

    $minKmQuery = "SELECT MIN(kilometrage) FROM ".$DATABASE.".vehicule;";
    $minKmStmt = db()->prepare($minKmQuery);
    $minKmStmt->execute();

    $minKm = $minKmStmt->fetchColumn();
    $minKm = (int)$minKm;

    // Prix ----------------------------------------------------------------------------------------

    $maxPrixQuery = "SELECT MAX(prix) FROM ".$DATABASE.".vehicule;";
    $maxPrixStmt = db()->prepare($maxPrixQuery);
    $maxPrixStmt->execute();

    $maxPrix = $maxPrixStmt->fetchColumn();
    $maxPrix = (int)$maxPrix;

    $minPrixQuery = "SELECT MIN(prix) FROM ".$DATABASE.".vehicule;";
    $minPrixStmt = db()->prepare($minPrixQuery);
    $minPrixStmt->execute();

    $minPrix = $minPrixStmt->fetchColumn();
    $minPrix = (int)$minPrix;

    // Années --------------------------------------------------------------------------------------

    $maxAgeQuery = "SELECT MAX(annee) FROM ".$DATABASE.".vehicule;";
    $maxAgeStmt = db()->prepare($maxAgeQuery);
    $maxAgeStmt->execute();

    $maxAge = $maxAgeStmt->fetchColumn();
    $maxAge = (int)$maxAge;

    $minAgeQuery = "SELECT MIN(annee) FROM ".$DATABASE.".vehicule;";
    $minAgeStmt = db()->prepare($minAgeQuery);
    $minAgeStmt->execute();

    $minAge = $minAgeStmt->fetchColumn();
    $minAge = (int)$minAge;

} catch (PDOException $e) {
    die("Echec de la connexion: " . $e->getMessage());
}