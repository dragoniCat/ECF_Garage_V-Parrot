<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laisser un avis</title>

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
    <script src="https://kit.fontawesome.com/d78fac7538.js" crossorigin="anonymous"></script>

    <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <?php include('components/header/header.php'); ?>

    <div id="logo">
        <img src="assets/images/logo-garage.svg" alt="Garage V. Parrot logo" class="responsive-logo">
    </div>

    <div class="main">
        <h class="heading">Laisser un avis</h>

        <?php 
        include('components/forms/avis-form.php');
        ?>

    
    </div>
    
    <?php include('components/footer/footer.php'); ?>
</body>
</html>