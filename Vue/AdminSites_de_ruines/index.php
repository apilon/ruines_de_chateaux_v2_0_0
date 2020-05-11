<?php $this->titre = 'Ruines de châteaux'; ?>

<a href="Adminsites_de_ruines/ajouter">
    <h2 class="nomSite_de_ruines">Ajouter un site_de_ruines</h2>
</a>
<?php foreach ($sites_de_ruines as $site_de_ruines):
    ?>

    <article>
        <header>
            <a href="Adminsites_de_ruines/lire/<?= $this->nettoyer($site_de_ruines['id']) ?>">
                <h1 class="nomSite_de_ruines"><?= $this->nettoyer($site_de_ruines['nom']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($site_de_ruines['description']) ?></strong><br>
            par <?= $this->nettoyer($site_de_ruines['nomUtil']) ?><br>
            <time>Prix : <?= $this->nettoyer($site_de_ruines['prix']) ?> CZK </time><br>
            <a href="Adminsites_de_ruines/modifier/<?= $this->nettoyer($site_de_ruines['id']) ?>"> [modifier le site de ruines]</a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
