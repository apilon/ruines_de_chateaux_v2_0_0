<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Type.php';

class ControleurTypes extends Controleur {

    private $prix;

    public function __construct() {
        $this->prix = new Type();
    }

// recherche et retourne les prixs pour l'autocomplete
    public function index() {
        $term = $this->requete->getParametre('term');
        echo $this->prix->searchType($term);
    }

}
