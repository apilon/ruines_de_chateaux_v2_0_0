<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Site_de_ruines.php';
require_once 'Modele/chose_a_faire.php';

class ControleurSites_de_ruines extends Controleur {

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
        $choses_a_faire = $this->chose_a_faire->getChoses_a_faire($idSite_de_ruines);
        $this->genererVue(['site_de_ruines' => $site_de_ruines, 'choses_a_faire' => $choses_a_faire]);
    }

}
