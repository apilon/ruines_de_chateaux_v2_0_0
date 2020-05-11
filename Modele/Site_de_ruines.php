<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux sites_de_ruines 
 * 
 * @author André Pilon
 */
class Site_de_ruines extends Modele {

// Renvoie la liste de tous les sites_de_ruines, triés par identifiant décroissant avec le nom de l'utilisateus lié
    public function getSites_de_ruines() {
        $sql = 'SELECT s.id,'               			
                . ' s.nom,'
                . ' s.utilisateur_id,'
                . ' s.description,'
                . ' s.prix,'
                . ' u.nom as nomUtil,'
                . ' u.identifiant'
                . ' FROM sites_de_ruines s'
                . ' INNER JOIN utilisateurs u'
                . ' ON s.utilisateur_id = u.id'
                . ' ORDER BY id desc';
        $sites_de_ruines = $this->executerRequete($sql);
        return $sites_de_ruines;
    }

// Renvoie la liste de tous les sites_de_ruines, triés par identifiant décroissant
    public function setSite_de_ruines($site_de_ruines) {
        $sql = 'INSERT INTO sites_de_ruines ('
                . ' nom,'
                . ' description,'
                . ' utilisateur_id,'
                . ' prix)'
                . ' VALUES(?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $site_de_ruines['nom'],
            $site_de_ruines['description'],
            $site_de_ruines['utilisateur_id'],
            $site_de_ruines['prix']
                ]
        );
        return $result;
    }

// Renvoie les informations sur un site_de_ruines avec le nom de l'utilisateur lié
    function getSite_de_ruines($idSite_de_ruines) {
        $sql = 'SELECT s.id,'
                . ' s.nom,'
                . ' s.utilisateur_id,'
                . ' s.description,'
                . ' s.prix,'
                . ' u.nom as nomUtil'
                . ' FROM sites_de_ruines s'
                . ' INNER JOIN utilisateurs u'
                . ' ON s.utilisateur_id = u.id'
                . ' WHERE s.id=?';
        $site_de_ruines = $this->executerRequete($sql, [$idSite_de_ruines]);
        if ($site_de_ruines->rowCount() == 1) {
            return $site_de_ruines->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun site de ruines ne correspond à l'identifiant '$idSite_de_ruines'");
        }
    }

// Met à jour un site_de_ruines
    public function updateSite_de_ruines($site_de_ruines) {
        $sql = 'UPDATE sites_de_ruines'
                . ' SET nom = ?,'
                . ' description = ?,'
                . ' utilisateur_id = ?,'
                . ' prix = ?'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [
            $site_de_ruines['nom'],
            $site_de_ruines['description'],
            $site_de_ruines['utilisateur_id'],
            $site_de_ruines['prix'],
            $site_de_ruines['id']
                ]
        );
        return $result;
    }

}
