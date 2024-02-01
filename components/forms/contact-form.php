<?php if (isset($success_message)) : ?>
    <div class="alert alert-success">
        <?= $success_message ?>
    </div>
<?php endif ?>

<div class="contact-form-container">
    <form action="./includes/contactformhandler.php" method="post">
        <div class="row">
            <div class="col">
                <label for="nom">Nom</label>
                <input id="nom" type="text" name="nom" value="<?= $inputs['nom'] ?? '' ?>">
                <small><?= $errors['name'] ?? '' ?></small>
            </div>
            <div class="col-md">
                <label for="prenom">Prénom</label>
                <input id="prenom" type="text" name="prenom" value="<?= $inputs['prenom'] ?? '' ?>">
                <small><?= $errors['prenom'] ?? '' ?></small>
            </div>
            <div class="col-md">
                <label for="telephone">Numéro de téléphone</label>
                <input id="telephone" type="tel" name="telephone" 
                    value="<?= $inputs['telephone'] ?? '' ?>">
                <small><?= $errors['telephone'] ?? '' ?></small>
            </div>
        </div>

        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" value="<?= $inputs['email'] ?? '' ?>">
        <small><?= $errors['email'] ?? '' ?></small>
        <br>

        <label for="message label-textarea">Message</label>
        <br>
        <textarea id="message" name="message" rows="10" cols="30">
            <?= $inputs['message'] ?? '' ?>
        </textarea>
        <br>
        <small><?= $errors['message'] ?? '' ?></small>

        <label for="motif" aria-hidden="true" class="invisible-pour-utilisateur">Motif
            <input type="text" id="motif" name="motif" class="invisible-pour-utilisateur" 
                tabindex="-1" autocomplete="off">
        </label>

        <div class="centerize">
            <button type="submit" name="envoi-mail" class="btn btn-secondary">Envoyer</button>
        </div>
    </form>
</div>