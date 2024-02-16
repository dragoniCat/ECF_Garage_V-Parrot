<?php 
session_start();
if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    die();
} else if ($_SESSION['userID'] != 1) {
    header('Location: employe.php');
    die();
}

try {
    require_once "includes/dbh.inc.php";

    $query1 = "SELECT contenu FROM '".$database."'.services WHERE id = 1;";
    $query2 = "SELECT contenu FROM '".$database."'.services WHERE id = 2;";
    $query3 = "SELECT contenu FROM '".$database."'.services WHERE id = 3;";

    $stmt1 = $pdo->prepare($query1);
    $stmt2 = $pdo->prepare($query2);
    $stmt3 = $pdo->prepare($query3);

    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();

    $service1 = $stmt1->fetchColumn();
    $service2 = $stmt2->fetchColumn();
    $service3 = $stmt3->fetchColumn();

    $stmt1->closeCursor();
    $stmt2->closeCursor();
    $stmt3->closeCursor();
    //$pdo = null;
    //$stmt = null;

} catch (PDOException $e) {
    die("Echec de la connexion: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous"
    >
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>

    <link href="css/style.css" rel="stylesheet">
    
    <style>
        body {
            margin-top: 5%;
            margin-bottom: 10%;
        }
    </style>
</head>
<body>
    <div class="main">
        <h class="heading">Bienvenue Vincent!</h>
        
        <div class="fw-bold secondary-heading">Services proposés</div>
        <form action="includes/servicesformhandler.php" method="post">
            <div class="row">
                <div class="col-sm">
                    <label for="service1 label-textarea">Service 1</label>
                    <br>
                    <textarea name="service1" rows="10" cols="30"><?php echo $service1; ?></textarea>
                </div>
                <div class="col-sm">
                    <label for="service2 label-textarea">Service 2</label>
                    <br>
                    <textarea name="service2" rows="10" cols="30"><?php echo $service2; ?></textarea>
                </div>
                <div class="col-sm">
                    <label for="service3 label-textarea">Service 3</label>
                    <br>
                    <textarea name="service3" rows="10" cols="30"><?php echo $service3; ?></textarea>
                </div>
            </div>

            <div class="centerize">
                <button type="submit" name="submit" class="btn btn-secondary">Valider</button>
            </div>
        </form>


        <div class="fw-bold secondary-heading">Horaires</div>
        <?php require_once "includes/horairesdatahandler.php"; ?>
        <form action="includes/horairesformhandler.php" method="post">
            <div class="row">
                <div class="col-sm">
                    <label for="lundi">Lundi</label>
                    <input id="lundi" type="text" name="lundi" value="<?php echo $lundi; ?>">
                </div>
                <div class="col-sm">
                    <label for="mardi">Mardi</label>
                    <input id="mardi" type="text" name="mardi" value="<?php echo $mardi; ?>">
                </div>
                <div class="col-sm">
                    <label for="mercredi">Mercredi</label>
                    <input id="mercredi" type="text" name="mercredi" value="<?php echo $mercredi; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label for="jeudi">Jeudi</label>
                    <input id="jeudi" type="text" name="jeudi" value="<?php echo $jeudi; ?>">
                </div>
                <div class="col-sm">
                    <label for="vendredi">Vendredi</label>
                    <input id="vendredi" type="text" name="vendredi" value="<?php echo $vendredi; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <label for="samedi">Samedi</label>
                    <input id="samedi" type="text" name="samedi" value="<?php echo $samedi; ?>">
                </div>
                <div class="col-sm">
                    <label for="dimanche">Dimanche</label>
                    <input id="dimanche" type="text" name="dimanche" value="<?php echo $dimanche; ?>">
                </div>
            </div>
            
            <div class="centerize">
                <button type="submit" name="submit" class="btn btn-secondary">Valider</button>
            </div>
        </form>

        <div style="margin-top: 50px;">
            <?php include('components/avis-clients.php'); ?>
        </div>

        <div style="margin-top: 150px;">
            <?php include('components/vehicules-table.php'); ?>
        </div>

    </div>
</body>
</html>