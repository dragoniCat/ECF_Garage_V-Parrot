<?php
// Afficher message
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['inputs']) && isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
    $inputs = $_SESSION['inputs'];
    unset($_SESSION['inputs']);
} ?>

<?php if (isset($success_message)) : ?>
    <div class="alert alert-success">
        <?= $success_message ?>
    </div>
<?php endif ?>

<div class="avis-form-container">
    <form action="includes/avisformhandler.php" method="post">
        <div class="row">
            <div class="col">
                <label for="nom">Nom</label>
                <input id="nom" type="text" name="nom">
                <small><?= $errors['nom'] ?? '' ?></small>
            </div>
            <div class="col-md">
                <div class="stars">
                    <div class="centerize">
                        <label for="note">Note</label>
                    </div>
                    <div id="note">
                        <input class="star star-5" id="star-5" type="radio" name="star-5"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star-4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star-3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star-2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star-1"/>
                        <label class="star star-1" for="star-1"></label>
                    </div>
                </div>
            </div>
        </div>

        <label for="message label-textarea">Message</label>
        <br>
        <textarea name="message" rows="10" cols="30"></textarea>
        <small><?= $errors['message'] ?? '' ?></small>
        <br>

        <label for="motif" aria-hidden="true" class="invisible-pour-utilisateur">Motif
            <input type="text" id="motif" name="motif" class="invisible-pour-utilisateur" 
                tabindex="-1" autocomplete="off">
        </label>

        <div class="centerize">
            <button type="submit" name="envoi-avis" class="btn btn-secondary">Envoyer</button>
        </div>
    </form>
</div>