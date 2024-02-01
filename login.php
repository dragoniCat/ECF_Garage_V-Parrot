<?php
require_once 'includes/config.php';

if (isset($_SESSION['userID'])) {
    if ($_SESSION['userID'] == 1) {
        header('Location: admin.php');
        die();
    } else if ($_SESSION['userID'] != 1) {
        header('Location: employe.php');
        die();
    }
}

$errors = [];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
        form {
            padding: 10%;
        }

        @media screen and (min-width: 1200px) {
            form {
                margin: 0px 15%;
            }
        }
    </style>
</head>
<body>

    <?php if (isset($_SESSION["loginError"])) : ?>
        <div class="alert alert-error">
            <?= $_SESSION["loginError"] ?>
        </div>
    <?php endif ?>
    
    <form action="includes/login.inc.php" method="post">
        <div class="centerize">
            <label for="email">Adresse e-mail</label>
            <input id="email" type="email" name="email">

            <label for="mdp">Mot de passe</label>
            <input id="mdp" type="password" name="mdp">

            <button type="submit" name="submit" class="btn btn-secondary">Connexion</button>
        </div>
    </form>


</body>
</html>