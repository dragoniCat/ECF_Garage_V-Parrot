<?php
try {
    require_once "dbh.inc.php";

    $query1 = "SELECT * FROM gvp_database.avis WHERE estValide = true;";
    $query2 = "SELECT * FROM gvp_database.avis WHERE estValide = false OR estValide IS NULL;";

    $stmt1 = db()->prepare($query1);
    $stmt2 = db()->prepare($query2);

    $stmt1->execute();
    $stmt2->execute();

    $avisPubliques = array();
    while ($avisPublique = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $avisPubliques[] = $avisPublique;
    }
    $stmt1->closeCursor();

    $avisQueue = array();
    while ($avis = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        $avisQueue[] = $avis;
    }
    $stmt2->closeCursor();

} catch (PDOException $e) {
    die("Echec de la connexion: " . $e->getMessage());
}
