<?php

declare(strict_types=1);

function get_email(string $email) {
    $tableName = "utilisateurs";
    $query = "SELECT * FROM ".$DATABASE.".".$tableName." WHERE email = :email;";
    $stmt = db()->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


