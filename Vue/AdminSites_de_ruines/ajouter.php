<?php $this->titre = "Ajouter un site de ruines"; ?>

<header>
    <h1 id="nomReponses">Ajouter un site de ruines par <u><?= $utilisateur ?></u> :</h1>
</header>
<form action="Adminsites_de_ruines/nouveauSite_de_ruines" method="post">
    <h2>Ajouter un site_de_ruines</h2>
    <p>
        <label for="nom">Nom du site</label> : <input type="text" name="nom" id="nom" /> <br />
        <label for="sous_nom">Description</label> :  <input type="text" name="description" id="sous_nom" /><br />
        <label for="prix">Prix</label> : <input type="text" name="prix" id="prix" /> <br />
        <input type="hidden" name="utilisateur_id" value="<?= $idUtilisateur ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>


