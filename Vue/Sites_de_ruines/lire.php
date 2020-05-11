<?php $this->titre = $this->nettoyer($site_de_ruines['nom']); ?>

<article>
    <header>
        <h1 class="nomSite_de_ruines"><?= $this->nettoyer($site_de_ruines['nom']) ?></h1>
        <time>prix = <?= $this->nettoyer($site_de_ruines['prix']) ?> CZK</time>, par <?= $this->nettoyer($site_de_ruines['nomUtil']) ?>
        <h3 class=""><?= $this->nettoyer($site_de_ruines['description']) ?></h3>
    </header>
</article>
<hr />
<header>
    <h1 id="nomReponses">Choses à faire autour de <?= $this->nettoyer($site_de_ruines['nom']) ?> :</h1>
</header>
<?= ($choses_a_faire->rowCount() == 0) ? '<p class="message">Pas encore de choses à faire entrée pour ce site_de_ruines.</p>' : '' ?>
<?php
foreach ($choses_a_faire as $chose_a_faire):
    ?>
        <p>
            <strong><?= $this->nettoyer($chose_a_faire['nom']) ?></strong><br/>
            <?= $this->nettoyer($chose_a_faire['description']) ?>
        </p>
<?php endforeach; ?>



