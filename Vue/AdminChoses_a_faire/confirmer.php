<?php $this->titre = "Effacer - " . $this->nettoyer($chose_a_faire['nom']); ?>

<article>
    <header>
        <p><h1>
            Effacer?
        </h1>
        <strong><?= $this->nettoyer($chose_a_faire['nom']) ?></strong><br/>
        <?= $this->nettoyer($chose_a_faire['description']) ?>
        </p>
    </header>
</article>

<form action="AdminChoses_a_faire/supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($chose_a_faire['id']) ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="Adminsites_de_ruines/lire" method="post" >
    <input type="hidden" name="id" value="<?= $this->nettoyer($chose_a_faire['site_de_ruines_id']) ?>" />
    <input type="submit" value="Annuler" />
</form>


