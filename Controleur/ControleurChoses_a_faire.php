<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/chose_a_faire.php';

class ControleurChoses_a_faire extends Controleur {

    private $chose_a_faire;

    public function __construct() {
        $this->chose_a_faire = new chose_a_faire();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les choses_a_faire
    public function index() {
        $choses_a_faire = $this->chose_a_faire->getChoses_a_fairePublics();
        $this->genererVue(['choses_a_faire' => $choses_a_faire]);
    }

// Ajoute un chose_a_faire à un site_de_ruines
    public function ajouter() {
        $chose_a_faire['site_de_ruines_id'] = $this->requete->getParametreId("site_de_ruines_id");
        $chose_a_faire['nom'] = $this->requete->getParametre('nom');
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un chose a faire n'est pas permis en démonstration");
        } else {
            $chose_a_faire['nom'] = $this->requete->getParametre('nom');
            $chose_a_faire['description'] = $this->requete->getParametre('description');
            // Ajouter le chose_a_faire à l'aide du modèle
            $this->chose_a_faire->setChose_a_faire($chose_a_faire);
        }

        //Recharger la page pour mettre à jour la liste des choses_a_faire associés
        $this->rediriger('Adminsites_de_ruines', 'lire/' . $chose_a_faire['site_de_ruines_id']);
    }

}
