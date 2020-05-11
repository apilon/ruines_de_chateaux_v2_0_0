<?php

require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Site_de_ruines.php';
require_once 'Modele/Chose_a_faire.php';

class ControleurAdminSites_de_ruines extends ControleurAdmin {

    private $site_de_ruines;
    private $chose_a_faire;

    public function __construct() {
        $this->site_de_ruines = new Site_de_ruines();
        $this->chose_a_faire = new chose_a_faire();
    }

// Affiche la liste de tous les sites_de_ruines du blog
    public function index() {
        $sites_de_ruines = $this->site_de_ruines->getSites_de_ruines();
        $this->genererVue(['sites_de_ruines' => $sites_de_ruines]);
    }

// Affiche les détails sur un site_de_ruines
    public function lire() {
        $idSite_de_ruines = $this->requete->getParametreId("id");
        $site_de_ruines = $this->site_de_ruines->getSite_de_ruines($idSite_de_ruines);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $choses_a_faire = $this->chose_a_faire->getChoses_a_faire($idSite_de_ruines);
        $this->genererVue(['site_de_ruines' => $site_de_ruines, 'choses_a_faire' => $choses_a_faire, 'erreur' => $erreur]);
    }

    public function ajouter() {
        $vue = new Vue("Ajouter");
        $this->genererVue();
    }

// Enregistre le nouvel site_de_ruines et retourne à la liste des sites_de_ruines
    public function nouveauSite_de_ruines() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Ajouter un site_de_ruines n'est pas permis en démonstration");
        } else {
            $site_de_ruines['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $site_de_ruines['nom'] = $this->requete->getParametre('nom');
            $site_de_ruines['description'] = $this->requete->getParametre('description');
            $site_de_ruines['prix'] = $this->requete->getParametreId('prix');
            $this->site_de_ruines->setSite_de_ruines($site_de_ruines);
            $this->executerAction('index');
        }
    }

// Modifier un site_de_ruines existant    
    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $site_de_ruines = $this->site_de_ruines->getSite_de_ruines($id);
        $this->genererVue(['site_de_ruines' => $site_de_ruines]);
    }

// Enregistre l'site_de_ruines modifié et retourne à la liste des sites_de_ruines
    public function miseAJour() {
        if ($this->requete->getSession()->getAttribut("env") == 'prod') {
            $this->requete->getSession()->setAttribut("message", "Modifier un site_de_ruines n'est pas permis en démonstration");
        } else {
            $site_de_ruines['id'] = $this->requete->getParametreId('id');
            $site_de_ruines['utilisateur_id'] = $this->requete->getParametreId('utilisateur_id');
            $site_de_ruines['nom'] = $this->requete->getParametre('nom');
            $site_de_ruines['description'] = $this->requete->getParametre('description');
            $site_de_ruines['prix'] = $this->requete->getParametreId('prix');
            $this->site_de_ruines->updateSite_de_ruines($site_de_ruines);
            $this->executerAction('index');
        }
    }

}
