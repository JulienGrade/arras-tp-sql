<?php

$title = "Catalogue de cours";

include_once 'partials/header.php';
require_once 'request/catalogue.dao.php';

$cours= getCours();


// Fonction permettant de tronquer le texte
function truncate($text, $ending = '...') {
    if (strlen($text) > 50) {
        return substr($text, 0, 50).$ending;
    }
    return $text;
}
?>
    <div class="container-md mt-5">
        <div class="row no-gutters">
            <div class="col-md-4 mt-5 d-flex ">
            <?php foreach ($cours as $cour) : ?>

                    <div class="card mx-auto" style="width: 18rem;height: 30rem">
                        <img src="assets/img/<?= $cour['image'] ?>" class="card-img-top img-fluid" alt="<?= $cour['libelle'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $cour['libelle'] ?></h5>
                            <p class="card-text"><?= truncate($cour['description']) ?></p>
                            <?php
                            $type = getCoursType($cour['idType']);
                            ?>
                            <span class="badge bg-primary"><?= $type['libelle'] ?></span>
                        </div>
                    </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php include_once 'partials/footer.php';