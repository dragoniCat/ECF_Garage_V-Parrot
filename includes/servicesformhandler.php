<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $service1 = $_POST["service1"];
    $service2 = $_POST["service2"];
    $service3 = $_POST["service3"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO gvp_database.services (id) VALUES ('1') ON DUPLICATE KEY UPDATE contenu=?;
            INSERT INTO gvp_database.services (id) VALUES ('2') ON DUPLICATE KEY UPDATE contenu=?;
            INSERT INTO gvp_database.services (id) VALUES ('3') ON DUPLICATE KEY UPDATE contenu=?;";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$service1, $service2, $service3]);

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