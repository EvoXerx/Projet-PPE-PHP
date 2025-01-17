<?php

use utils\SessionHelpers;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greta TV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/style/main.css">
</head>

<body class="<?= isset($_GET['id']) ? 'brick' : '' ?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <?php
        if (isset($_GET['id'])) {
            echo '<a class="navbar-brand" href="/">← Retour</a>';
        } else {
            echo '<a class="navbar-brand" href="/">APPLI WEB</a>';
        }
        ?>
        <ul class="nav nav-pills">
            <?php
            if(SessionHelpers::isLogin()){
                echo '<li class="nav-item"><a href="/auth/me" class="nav-link">Mon compte</a></li>';
            } else {
                echo '<li class="nav-item"><a href="/auth/login" class="nav-link">Connexion</a></li>';
            }
            ?>
            <li class="nav-item"><a href="/about" class="nav-link">À propos</a></li>
        </ul>
    </div>
</nav>