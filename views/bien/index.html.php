<h1 class="text-primary"></h1>
<div class="d-flex flex-row flex-wrap">
    <?php

    use Core\Repository\AppRepoManager;
    // var_dump();
    ?>
    <?php foreach ($biens as $bien) : ?>
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $bien->titre ?></h5>
                <p class="card-text"><?= $bien->addresse ?></p>
                <?php $first_photo = AppRepoManager::getRm()->getPhotoRepository()->getAllPhotoById($bien->id)['0']->image_path; ?>
                <img src="/img/<?= $first_photo ?>" style="width: 250px; height: 250px;" alt="<?= $bien->titre ?>">
                <p class="card-text text-primary"><?= $bien->prix ?> € par nuit</p>
                <a href="#" class="btn btn-primary mt-5">Voir Détails</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>