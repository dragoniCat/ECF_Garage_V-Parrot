<div class="col">
    <div class="card h-100 shadow avis-card">
        <div class="card-body">
            <div class="centerize rating">
                <?php if ($avisPublique['note'] == 5) {
                    echo '
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                    ';
                } else if ($avisPublique['note'] == 4) {
                    echo '
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star"></span>
                    ';
                } else if ($avisPublique['note'] == 3) {
                    echo '
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                    ';
                } else if ($avisPublique['note'] == 2) {
                    echo '
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                    ';
                } else if ($avisPublique['note'] == 1) {
                    echo '
                        <span class="fa-solid fa-star star-checked"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                    ';
                } else {
                    echo '
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                    ';
                } ?>
            </div>
            <p class="card-text">
                <?= $avisPublique['message']; ?>
            </p>
            <div class="centerize fst-italic">
                <div class="card-text"><?= $avisPublique['nom']; ?></div>
            </div>
        </div>
    </div>
</div>