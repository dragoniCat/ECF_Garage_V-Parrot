<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $lundi = htmlspecialchars($_POST["lundi"]);
    $mardi = htmlspecialchars($_POST["mardi"]);
    $mercredi = htmlspecialchars($_POST["mercredi"]);
    $jeudi = htmlspecialchars($_POST["jeudi"]);
    $vendredi = htmlspecialchars($_POST["vendredi"]);
    $samedi = htmlspecialchars($_POST["samedi"]);
    $dimanche = htmlspecialchars($_POST["dimanche"]);

    try {
        require_once "dbh.inc.php";

        $query = 
            "INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Lundi') ON DUPLICATE KEY UPDATE horaire=?;
            INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Mardi') ON DUPLICATE KEY UPDATE horaire=?;
            INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Mercredi') ON DUPLICATE KEY UPDATE horaire=?;
            INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Jeudi') ON DUPLICATE KEY UPDATE horaire=?;
            INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Vendredi') ON DUPLICATE KEY UPDATE horaire=?;
            INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Samedi') ON DUPLICATE KEY UPDATE horaire=?;
            INSERT INTO ".$DATABASE.".horaires (jour) VALUES ('Dimanche') ON DUPLICATE KEY UPDATE horaire=?;
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$lundi, $mardi, $mercredi, $jeudi, $vendredi, $samedi, $dimanche]);

        $pdo = null;
        $stmt->closeCursor();

        header("Location: ../admin.php");

        exit();

    } catch (PDOException $e) {
        die("Echec de la connexion: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}