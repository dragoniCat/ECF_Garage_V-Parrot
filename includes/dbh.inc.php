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

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$DB_HOST = $dbparts['host'];
$DB_USERNAME = $dbparts['user'];
$DB_PASSWORD = $dbparts['pass'];
$DATABASE = ltrim($dbparts['path'],'/');

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DATABASE", $DB_USERNAME, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Echec de connexion: " . $e->getMessage();
}

function db(): PDO {
    static $pdo;

    if (!$pdo) {
        $pdo = new PDO(
            sprintf("mysql:host=$DB_HOST;dbname=$DATABASE", $DB_HOST, $DATABASE),
            $DB_USERNAME,
            $DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}