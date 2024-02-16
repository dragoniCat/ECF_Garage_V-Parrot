<?php

// $dsn = "mysql:host=localhost;dbname=gvp_database";
$dsn = "mysql://edmb7232dcik47yq:n1et8n8ejgqivqqc@d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/qui5aafu163l1ogs";
// $dbusername = "root";
$dbusername = "edmb7232dcik47yq";
// $dbpassword = "";
$dbpassword = "n1et8n8ejgqivqqc";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

// const DB_HOST = 'localhost';
const DB_HOST = 'd3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
// const DB_NAME = 'auth';
const DB_NAME = 'qui5aafu163l1ogs';
// const DB_USER = 'root';
const DB_USER = 'edmb7232dcik47yq';
// const DB_PASSWORD = '';
const DB_PASSWORD = 'n1et8n8ejgqivqqc';

function db(): PDO {
    static $pdo;

    if (!$pdo) {
        $pdo = new PDO(
            // sprintf("mysql:host=localhost;dbname=gvp_database;charset=UTF8", DB_HOST, DB_NAME),
            sprintf("mysql://edmb7232dcik47yq:n1et8n8ejgqivqqc@d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/qui5aafu163l1ogs", 
                DB_HOST, DB_NAME),
            DB_USER,
            DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}