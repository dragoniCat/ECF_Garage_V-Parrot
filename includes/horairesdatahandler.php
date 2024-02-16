<?php
    $query1 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Lundi';";
    $query2 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Mardi';";
    $query3 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Mercredi';";
    $query4 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Jeudi';";
    $query5 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Vendredi';";
    $query6 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Samedi';";
    $query7 = "SELECT horaire FROM ".$database.".horaires WHERE jour = 'Dimanche';";

    $stmt1 = $pdo->prepare($query1);
    $stmt2 = $pdo->prepare($query2);
    $stmt3 = $pdo->prepare($query3);
    $stmt4 = $pdo->prepare($query4);
    $stmt5 = $pdo->prepare($query5);
    $stmt6 = $pdo->prepare($query6);
    $stmt7 = $pdo->prepare($query7);

    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();
    $stmt4->execute();
    $stmt5->execute();
    $stmt6->execute();
    $stmt7->execute();


    $lundi = $stmt1->fetchColumn();
    $mardi = $stmt2->fetchColumn();
    $mercredi = $stmt3->fetchColumn();
    $jeudi = $stmt4->fetchColumn();
    $vendredi = $stmt5->fetchColumn();
    $samedi = $stmt6->fetchColumn();
    $dimanche = $stmt7->fetchColumn();

    $stmt1->closeCursor();
    $stmt2->closeCursor();
    $stmt3->closeCursor();
    $stmt4->closeCursor();
    $stmt5->closeCursor();
    $stmt6->closeCursor();
    $stmt7->closeCursor();