<?php

declare(strict_types=1);

function get_email(string $email) {
    require_once "dbh.inc.php";
    // $query = "SELECT * FROM gvp_database.utilisateurs WHERE email = :email;";
    $query = "SELECT * FROM qui5aafu163l1ogs.utilisateurs WHERE email = :email;";
    $stmt = db()->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


