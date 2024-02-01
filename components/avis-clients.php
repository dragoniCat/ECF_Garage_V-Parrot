<?php require_once "includes/avis_model.php"; ?>

<h class="heading">Avis clients</h>

<div class="fw-bold secondary-heading">Avis publiés</div> <!-- --------------------------------- -->

<div class="table-responsive">
    <table class="table table-bordered border-dark-subtle">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Note</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avisPubliques as $avisPublique) : ?>
                <tr>
                    <td><?= $avisPublique['nom']; ?></td>
                    <td><?= $avisPublique['note']; ?></td>
                    <td><?= $avisPublique['message']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<form action="includes/avis_retirer.php" method="post">
    <div class="row" style="margin: 10px 10%;">
        <div class="col">
            <select class="form-select" aria-label="Sélectionner un avis" name="avisPublique" 
            id="avisPublique">
                <option selected>Sélectionner un avis</option>
                <?php foreach ($avisPubliques as $avisPublique) : ?>
                    <option><?= $avisPublique['nom']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <div class="centerize">
                <button type="submit" name="Retirer" class="btn btn-secondary btn-supprimer-offre">
                    Retirer
                </button>
            </div>
        </div>
    </div>
</form>

<div class="fw-bold secondary-heading">Avis stockés</div> <!-- --------------------------------- -->

<div class="table-responsive">
    <table class="table table-bordered border-dark-subtle">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Note</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avisQueue as $avis) : ?>
                <tr>
                    <td><?= $avis['nom']; ?></td>
                    <td><?= $avis['note']; ?></td>
                    <td><?= $avis['message']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<form action="includes/avis_publier.php" method="post" id="publier-form">
    <div class="row" style="margin: 10px 10%;">
        <div class="col">
            <select class="form-select" aria-label="Sélectionner un avis" name="avis" id="avis">
                <option selected>Sélectionner un avis</option>
                <?php foreach ($avisQueue as $avis) : ?>
                    <option><?= $avis['nom']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <div class="centerize">
                <button type="submit" name="Publier" class="btn btn-secondary btn-supprimer-offre">
                    Publier
                </button>
            </div>
        </div>
    </div>
</form>

<form action="includes/avis_supprimer.php" method="post" id="supprimer-form">
    <div class="row" style="margin: 10px 10%;">
        <div class="col">
            <select class="form-select" aria-label="Sélectionner un avis" name="avis" id="avis">
                <option selected>Sélectionner un avis</option>
                <?php foreach ($avisQueue as $avis) : ?>
                    <option><?= $avis['nom']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <div class="centerize">
                <button type="submit" name="Supprimer" class="btn btn-secondary btn-supprimer-offre">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
</form>