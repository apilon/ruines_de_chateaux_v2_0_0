<?php $this->titre = "Choses à faire" ?>

<header>
    <h1 id="nomReponses">Choses à faire autour des ruines de châteaux :</h1>
</header>
<?php
foreach ($choses_a_faire as $chose_a_faire):
    ?>
    <p>
        <strong><?= $this->nettoyer($chose_a_faire['nom']) ?></strong><br/>
        <?= $this->nettoyer($chose_a_faire['description']) ?><br />
        <a href="sites_de_ruines/lire/<?= $this->nettoyer($chose_a_faire['site_de_ruines_id']) ?>" >
            [ajouté pour le site de ruines <i><?= $this->nettoyer($chose_a_faire['nomSite']) ?></i>]</a></a>
    </p>
<?php endforeach; ?>