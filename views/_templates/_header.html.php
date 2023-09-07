<?php

use Core\Repository\AppRepoManager;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title_tag) ? $title_tag : "Mon site" ?></title>
    <!-- Voici une version plus élaborer de la Ternaire du dessus -->
    <!-- <?= $title_tag ?? "Mon site" ?> -->
    <!-- Mes CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid d-flex justify-content-around">
            <a href="/"><img src="/img/logo2.png" class="logo" alt="Logo du site"></a>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav d-flex flex-row">
                    <?php
                    $type_biens = AppRepoManager::getRm()->getTypeBienRepository()->getAllTypeBien();
                    foreach ($type_biens as $type_bien) : ?>
                        <li class="nav-item mx-3 hoover_typebien">
                            <a class="nav-link active text-primary" aria-current="page" href="#"><?= $type_bien->label ?></a>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item dropdown mx-3 hoover_typebien">
                        <a class="nav-link active text-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-vcard"></i>
                        </a>
                        <ul class="dropdown-menu hoover_typebien bg-dark" data-bs-theme="dark">
                            <li><a class="dropdown-item text-primary" href="/user/login">Se Connecter</a></li>
                            <li><a class="dropdown-item text-primary" href="/user/signin">S'Enregistrer</a></li>
                            <li><a class="dropdown-item text-primary" href="/user/signin">Gestion du compte</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="container">