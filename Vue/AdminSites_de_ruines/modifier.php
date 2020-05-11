<?php $this->titre = "Modifier - " . $this->nettoyer($site_de_ruines['nom']); ?>

<header>
    <h1 id="nomReponses">Modifier un site de ruines de <?= $utilisateur ?> :</h1>
</header>
<form action="Adminsites_de_ruines/miseAJour" method="post">
    <h2>Modifier un site de ruines</h2>
    <p>
        <label for="nom">Nom du site</label> : <input type="text" name="nom" id="nom" value="<?= $this->nettoyer($site_de_ruines['nom']) ?>" /> <br />
        <label for="description">Description</label> :  <input type="text" name="description" id="description" value="<?= $this->nettoyer($site_de_ruines['description']) ?>" /><br />
        <label for="prix">Prix</label> : <input type="number" name="prix" id="prix" value="<?= $this->nettoyer($site_de_ruines['prix']) ?>" /> CZK<br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="hidden" name="id" value="<?= $this->nettoyer($site_de_ruines['id']) ?>" /><br />
        <input type="submit" value="Modifier" />
    </p>
</form>


