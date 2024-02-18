<?php

// XAMPP
/*
$dsn = "mysql:host=localhost;dbname=gvp_database";
$dbusername = "root";
$dbpassword = "";
$database = "gvp_database";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

const DB_HOST = 'localhost';
const DB_NAME = 'auth';
const DB_USER = 'root';
const DB_PASSWORD = '';

function db(): PDO {
    static $pdo;

    if (!$pdo) {
        $pdo = new PDO(
            sprintf("mysql:host=localhost;dbname=gvp_database;charset=UTF8", DB_HOST, DB_NAME),
            DB_USER,
            DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}
*/

// $url = getenv('JAWSDB_URL');
// $dbparts = parse_url($url);

// $DB_HOST = $dbparts['host'];
// $DB_USERNAME = $dbparts['user'];
// $DB_PASSWORD = $dbparts['pass'];
// $DATABASE = ltrim($dbparts['path'],'/');

$JAWSDB_URL = "mysql://edmb7232dcik47yq:n1et8n8ejgqivqqc@d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/qui5aafu163l1ogs";
$DB_PORT = 3306;

$DB_HOST = "d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$DB_USERNAME = "edmb7232dcik47yq";
$DB_PASSWORD = "n1et8n8ejgqivqqc";
$DATABASE = "qui5aafu163l1ogs";

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DATABASE;port=$DB_PORT", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

function db(): PDO {
    static $pdo;

    if (!$pdo) {
        $pdo = new PDO(
            sprintf("mysql:host=d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=qui5aafu163l1ogs;port=3306", "d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com", "qui5aafu163l1ogs"),
            "edmb7232dcik47yq",
            "n1et8n8ejgqivqqc",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}