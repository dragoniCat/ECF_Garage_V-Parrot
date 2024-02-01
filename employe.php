<?php 
session_start();
if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    die();
} else if ($_SESSION['userID'] == 1) {
    header('Location: admin.php');
    die();
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
        <h class="heading">Bienvenue <?= $_SESSION["user_prenom"] ?>!</h>

        <div style="margin-top: 50px;">
            <?php include('components/avis-clients.php'); ?>
        </div>

        <div style="margin-top: 150px;">
            <?php include('components/vehicules-table.php'); ?>
        </div>
    </div>
</body>
</html>