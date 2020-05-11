<?php $this->titre = 'Ruines de châteaux'; ?>

<?php foreach ($sites_de_ruines as $site_de_ruines):
    ?>
    <article>
        <header>
            <a href="Sites_de_ruines/lire/<?= $this->nettoyer($site_de_ruines['id']) ?>">
                <h1 class="nomSite_de_ruines"><?= $this->nettoyer($site_de_ruines['nom']) ?></h1>
            </a>
            <strong class=""><?= $this->nettoyer($site_de_ruines['description']) ?></strong><br>
            par <?= $this->nettoyer($site_de_ruines['nomUtil']) ?><br>
            <time>prix <?= $this->nettoyer($site_de_ruines['prix']) ?></time>
        </header>
    </article>
    <hr />
<?php endforeach; ?>    
