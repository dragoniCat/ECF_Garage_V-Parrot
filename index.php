<?php 

session_start();

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

    require_once "includes/avis_model.php";

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
    <title>Garage V. Parrot</title>

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
    </script>
    <script src="https://kit.fontawesome.com/d78fac7538.js" crossorigin="anonymous"></script>

    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <?php include('components/header/header.php'); ?>

    <div id="logo">
        <img src="assets/images/logo-garage.svg" alt="Garage V. Parrot logo" class="responsive-logo">
    </div>

    <div class="main">
        <h class="heading">Nos services</h>
        <div class="row centerize">

                <div class="col">
                    <div class="white-card-bg"><?php echo $service1; ?></div>
                </div>
                <div class="col">
                    <div class="white-card-bg"><?php echo $service2; ?></div>
                </div>
                <div class="col">
                    <div class="white-card-bg"><?php echo $service3; ?></div>
                </div>
            
        </div>
    </div>

    <div class="bande-presentation">
        <div class="row">
            <div class="col presentation-section-1">
                <h class="heading">Qui nous sommes</h>
                <div class="presentation-texte">
                    <p>
                        <strong>Vincent Parrot</strong>, le propriétaire du garage, est fort de 
                        <strong>15 ans d'expérience</strong> dans la réparation automobile.
                    </p>
                    <p>
                        Lui et son équipe considèrons l'atelier comme un véritable lieu de 
                        <strong>confiance</strong> pour les clients.
                    </p>
                    <p>
                        Selon nous, vos voitures doivent à tout prix être entre de bonnes mains, 
                        alors n'hésitez pas à faire appel à nous.
                    </p>
                </div>
            </div>
            <div class="col-md">
                <img 
                    src="assets/images/Vincent-Parrot.png" 
                    alt="Photo de Vincent Parrot"
                    class="presentation-image"
                >
            </div>
        </div>
    </div>

    <div class="main">

        <h class="heading">Avis clients</h>
        <div class="avis-container">
            <div class="row row-cols-1 row-cols-md-2 g-5">
                <?php foreach ($avisPubliques as $avisPublique) {
                    include('components/cards/avis-card.php');
                } ?>
            </div>
        </div>

        <h class="heading">Contact</h>
        <div class="tel-container">
            <div class="row">
                <div class="col-1">
                    <img src="assets/icons/phone_icon.svg" alt="icone téléphone" class="icone-tel">
                </div>
                <div class="col-md">
                    <div class="heading">Téléphone</div>
                </div>
                <div class="col-md">
                    <div class="heading num-tel">06 XX XX XX XX</div>
                </div>
            </div>
        </div>

        <div class="contact-form-heading row" id="contact">
            <div class="col-1">
                <img src="assets/icons/mail_icon.svg" alt="icone mail" class="icone-mail">
            </div>
            <div class="col">
                <div class="heading mail-heading">Mail</div>
            </div>
        </div>

        <div class="contact-form-container-index">
            <?php include('includes/contactformhandler.php'); ?>
        </div>

    </div>

    <?php include('components/footer/footer.php'); ?>
</body>
</html>