<?php $this->titre = "Choses à faire" ?>

<header>
    <h1 id="nomReponses">Choses à faire autour des ruines de châteaux :</h1>
</header>
<?php
foreach ($choses_a_faire as $chose_a_faire):
    ?>
    <?php if ($chose_a_faire['efface'] == '0') : ?>
        <p><a href="Adminchoses_a_faire/confirmer/<?= $this->nettoyer($chose_a_faire['id']) ?>" >
                [Effacer]</a>
            <strong><?= $this->nettoyer($chose_a_faire['nom']) ?></strong><br/>
            <?= $this->nettoyer($chose_a_faire['description']) ?><br />
            <a href="Adminsites_de_ruines/lire/<?= $this->nettoyer($chose_a_faire['site_de_ruines_id']) ?>" >
                [ajouté pour le site de ruines <i><?= $this->nettoyer($chose_a_faire['nomSite']) ?></i>]</a></a>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminChoses_a_faire/retablir/<?= $this->nettoyer($chose_a_faire['id']) ?>" >
                [Rétablir]</a>
            chose à faire : <?= $this->nettoyer($chose_a_faire['nom']) ?> ?> EFFACÉE!
        </p>
    <?php endif; ?>
<?php endforeach; ?>