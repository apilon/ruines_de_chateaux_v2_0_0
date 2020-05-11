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
    <h1 id="nomReponses">Choses à faire autour du site <?= $this->nettoyer($site_de_ruines['nom']) ?> :</h1>
</header>
<?= ($choses_a_faire->rowCount() == 0) ? '<p class="message">Pas encore de choses à faire pour ce site de ruines.</p>' : '' ?>
<?php
foreach ($choses_a_faire as $chose_a_faire):
    ?>
    <?php if ($chose_a_faire['efface'] == '0') : ?>
        <a href="AdminChoses_a_faire/confirmer/<?= $this->nettoyer($chose_a_faire['id']) ?>" >
            [Effacer]</a>
            <strong><?= $this->nettoyer($chose_a_faire['nom']) ?></strong><br/>
            <?= $this->nettoyer($chose_a_faire['description']) ?>
        </p>
    <?php else : ?>
        <p class="efface"><a href="AdminChoses_a_faire/retablir/<?= $this->nettoyer($chose_a_faire['id']) ?>" >
                [Rétablir]</a>
            chose a faire : <?= $this->nettoyer($chose_a_faire['nom']) ?> effacée!
        </p>
    <?php endif; ?>
<?php endforeach; ?>

<form action="Choses_a_faire/ajouter" method="post">
    <h2>Ajouter une chose à faire</h2>
    <p>
        <label for="nom">Chose à faire</label> :  <input type="text" name="nom" id="nom" /><br />
        <label for="texte">Description</label> :  <textarea name="description" id="description" >Décrivez votre chose à faire ici</textarea><br />
        <input type="hidden" name="site_de_ruines_id" value="<?= $this->nettoyer($site_de_ruines['id']) ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

