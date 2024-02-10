<?php require_once "includes/vehicules_model.php"; ?>

<h class="heading">Voitures d'occasion en vente</h>

<div class="table-responsive">
    <table class="table table-bordered border-dark-subtle">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Image</th>
                <th scope="col">Prix</th>
                <th scope="col">Année de mise en circulation</th>
                <th scope="col">Kilométrage</th>
                <th scope="col">Carburant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicules as $vehicule) : ?>
                <tr>
                    <td><?= $vehicule['nom']; ?></td>
                    <td><?= $vehicule['image']; ?></td>
                    <td><?= $vehicule['prix']; ?> €</td>
                    <td><?= $vehicule['annee']; ?></td>
                    <td><?= $vehicule['kilometrage']; ?> km</td>
                    <td><?= $vehicule['carburant']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<form action="includes/vehicules_supprhandler.php" method="post">
    <div class="row" style="margin: 10px 10%;">
        <div class="col">
            <select class="form-select" aria-label="Sélectionner une offre" name="offre" id="offre">
                <option selected>Sélectionner une offre</option>
                <?php foreach ($vehicules as $vehicule) : ?>
                    <option><?= $vehicule['nom']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <div class="centerize">
                <button type="submit" name="supprimer" class="btn btn-secondary btn-supprimer-offre">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
</form>

<div class="centerize">
    <button 
        type="button" name="ajouter-offre" class="btn btn-secondary" 
        data-bs-toggle="modal" data-bs-target="#ajouter-offre-modal"
    >
        Ajouter une offre
    </button>
</div>

<?php 
if (isset($success_message)) : ?>
    <div class="alert alert-success">
        <?= $success_message; ?>
    </div>
<?php endif ?> 

<?php
if (isset($errors)) : ?>
    <div class="alert alert-danger">
        <?= $errors; ?>
    </div>
<?php endif ?>


<!-- Modal ---------------------------------------------------------------------------------------->

<div 
    class="modal fade" id="ajouter-offre-modal" tabindex="-1" 
    aria-labelledby="ajouter-offre-modalLabel" aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="ajouter-offre-modalLabel">Nouvelle offre</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
        <div class="modal-body">

            <form action="includes/vehiculesformhandler.php" method="post" 
            enctype="multipart/form-data">
                <label for="voiture-nom">Nom</label>
                <input id="voiture-nom" type="text" name="voiture-nom" required>

                <label for="prix">Prix</label>
                <input id="prix" type="number" name="prix" step="any" required>

                <label for="annee">Année de mise en circulation</label>
                <input id="annee" type="number" name="annee" required>

                <label for="kilometrage">Kilométrage</label>
                <input id="kilometrage" type="number" name="kilometrage" required>

                <label for="carburant">Carburant</label>
                <input id="carburant" type="text" name="carburant" required>

                <label for="voiture-image">Image</label>
                <input id="voiture-image" type="file" name="voiture-image" class="form-control" required>

                <div class="modal-footer">
                    <div class="centerize">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
