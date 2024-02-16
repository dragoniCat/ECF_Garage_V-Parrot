<?php
require_once "dbh.inc.php";

$minimum_km = $_POST["minimum_km"];
$maximum_km = $_POST["maximum_km"];

$minimum_prix = $_POST["minimum_prix"];
$maximum_prix = $_POST["maximum_prix"];

$minimum_age = $_POST["minimum_age"];
$maximum_age = $_POST["maximum_age"];

if(isset($_POST["action"])) {
    $query = "SELECT * FROM '".$database."'.vehicule WHERE 1";

    if(isset($_POST["minimum_km"], $_POST["maximum_km"]) && !empty($_POST["minimum_km"]) 
        && !empty($_POST["maximum_km"]))
    {
        $query .= " AND kilometrage BETWEEN '".$_POST["minimum_km"]."' AND '".$_POST["maximum_km"]."'
        ";
    }

    if(isset($_POST["minimum_prix"], $_POST["maximum_prix"]) && !empty($_POST["minimum_prix"]) 
        && !empty($_POST["maximum_prix"]))
    {
        $query .= " AND prix BETWEEN '".$_POST["minimum_prix"]."' AND '".$_POST["maximum_prix"]."'";
    }

    if(isset($_POST["minimum_age"], $_POST["maximum_age"]) && !empty($_POST["minimum_age"]) 
        && !empty($_POST["maximum_age"]))
    {
        $query .= " AND annee BETWEEN '".$_POST["minimum_age"]."' AND '".$_POST["maximum_age"]."'";
    }

    $stmt = $pdo->prepare($query);

    /* $stmt->bindParam(':minimum_km', $minimum_km, PDO::PARAM_INT);
    $stmt->bindParam(':maximum_km', $maximum_km, PDO::PARAM_INT);

    $stmt->bindParam(':minimum_prix', $minimum_prix, PDO::PARAM_INT);
    $stmt->bindParam(':maximum_prix', $maximum_prix, PDO::PARAM_INT);

    $stmt->bindParam(':minimum_age', $minimum_age, PDO::PARAM_INT);
    $stmt->bindParam(':maximum_age', $maximum_age, PDO::PARAM_INT); */

    $stmt->execute();
    $result = $stmt->fetchAll();
    $total_row = $stmt->rowCount();
    $output = '';
    if($total_row > 0) {
        foreach($result as $row) {
            $output .= include('../components/cards/offre-card.php');
        } 
    } else {
        $output = '<h3>Aucune offre ne correspond à vos critères.</h3>';
    }
    echo $output;
}