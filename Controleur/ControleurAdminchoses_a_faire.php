<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Chose_a_faire.php';

class ControleurAdminChoses_a_faire extends ControleurAdmin {

    private $chose_a_faire;

    public function __construct() {
        $this->chose_a_faire = new chose_a_faire();
    }

// L'action index n'est pas utilisée mais pourrait ressembler à ceci 
// en ajoutant la fonctionnalité de faire afficher tous les choses_a_faire
    public function index() {
        $choses_a_faire = $this->chose_a_faire->getChoses_a_faire();
        $this->genererVue(['choses_a_faire' => $choses_a_faire]);
    }
  
// Confirmer la suppression d'un chose_a_faire
    public function confirmer() {
        $id = $this->requete->getParametreId("id");
        // Lire le chose_a_faire à l'aide du modèle
        $chose_a_faire = $this->chose_a_faire->getchose_a_faire($id);
        $this->genererVue(['chose_a_faire' => $chose_a_faire]);
    }

// Supprimer un chose_a_faire
    public function supprimer() {
        $id = $this->requete->getParametreId("id");
        // Lire le chose_a_faire afin d'obtenir le id de l'site_de_ruines associé
        $chose_a_faire = $this->chose_a_faire->getchose_a_faire($id);
        // Supprimer le chose_a_faire à l'aide du modèle
        $this->chose_a_faire->deletechose_a_faire($id);
        //Recharger la page pour mettre à jour la liste des choses_a_faire associés
        $this->rediriger('Adminsites_de_ruines', 'lire/' . $chose_a_faire['site_de_ruines_id']);
    }

    // Rétablir un chose_a_faire
    public function retablir() {
        $id = $this->requete->getParametreId("id");
        // Lire le chose_a_faire afin d'obtenir le id de l'site_de_ruines associé
        $chose_a_faire = $this->chose_a_faire->getchose_a_faire($id);
        // Supprimer le chose_a_faire à l'aide du modèle
        $this->chose_a_faire->restorechose_a_faire($id);
        //Recharger la page pour mettre à jour la liste des choses_a_faire associés
        $this->rediriger('Adminsites_de_ruines', 'lire/' . $chose_a_faire['site_de_ruines_id']);
    }

}
