<div class="col">
    <div class="card h-100 shadow" style="width: 100%;">
        <img 
            src="assets/images/<?= $row['image']; ?>" class="card-img-top h-100" 
            alt="Photo de la voiture en vente" style="object-fit: cover;"
        >
        <div class="card-body">
            <h5 class="card-title fw-bold text-uppercase"><?= $row['nom']; ?></h5>
            <div class="card-text" style="color: #B1B1B1;">
                <?= $row['annee']; ?>
            </div>
            <div class="card-text" style="color: #B1B1B1;">
                <?= $row['carburant']; ?>
            </div>
            <div class="card-text" style="color: #B1B1B1;">
                <?= $row['kilometrage']; ?> km
            </div>
            <div class="fw-bold">
                <?= $row['prix']; ?> €
            </div>
            <div class="centerize">
                <button 
                    href="" class="btn btn-secondary" name="contacter" data-bs-toggle="modal" 
                    data-bs-target="#contacter-modal"
                >Contacter</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ---------------------------------------------------------------------------------------->

<div 
    class="modal fade" id="contacter-modal" tabindex="-1" 
    aria-labelledby="contacterLabel" aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="contact-form-modal">
                <?php 
                    $aProposOffre = true;
                    include('../components/forms/contact-form.php'); 
                ?>
            </div>
        </div>
    </div>
</div>
