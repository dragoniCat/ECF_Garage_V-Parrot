<?php
require_once("includes/dbh.inc.php");

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

    $pdo = null;
    $stmt = null;
?>

<footer class="footer">
    <div class="row">
        <div class="col">
            <div class="section-footer">
                <div class="heading lgrey">Garage V. Parrot</div>
                garage-v.parrot@xxx.com
                <br>
                06 XX XX XX XX
            </div>
            <div class="section-footer">
                <div class="heading lgrey">Navigation</div>
                <a href="https://localhost/ECF_Garage_V-Parrot/">Accueil</a>
                <br>
                <a href="https://localhost/ECF_Garage_V-Parrot/vehicules-occasion.php">
                    Véhicules d'occasion à vendre
                </a>
                <br>
                <a href="https://localhost/ECF_Garage_V-Parrot/laisser-un-avis.php">Laisser un avis</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="heading lgrey">Horaires d'ouverture</div>
            <table id="horaires-table" class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Lundi</th>
                        <td><?php echo $lundi; ?></td>
                        <!-- 08:45 - 12:00,  14:00 - 18:00 -->
                    </tr>
                    <tr>
                        <th scope="row">Mardi</th>
                        <td><?php echo $mardi; ?></td>
                        <!-- 08:45 - 12:00,  14:00 - 18:00 -->
                    </tr>
                    <tr>
                        <th scope="row">Mercredi</th>
                        <td><?php echo $mercredi; ?></td>
                        <!-- 08:45 - 12:00,  14:00 - 18:00 -->
                    </tr>
                    <tr>
                        <th scope="row">Jeudi</th>
                        <td><?php echo $jeudi; ?></td>
                        <!-- 08:45 - 12:00,  14:00 - 18:00 -->
                    </tr>
                    <tr>
                        <th scope="row">Vendredi</th>
                        <td><?php echo $vendredi; ?></td>
                        <!-- 08:45 - 12:00,  14:00 - 18:00 -->
                    </tr>
                    <tr>
                        <th scope="row">Samedi</th>
                        <td><?php echo $samedi; ?></td>
                        <!-- 08:45 - 12:00 -->
                    </tr>
                    <tr>
                        <th scope="row">Dimanche</th>
                        <td><?php echo $dimanche; ?></td>
                        <!-- Fermé -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</footer>