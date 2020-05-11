<?php

require_once 'Framework/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux 
 * 
 * @author Baptiste Pesquet
 */
class chose_a_faire extends Modele {

    // Renvoie la liste des choses_a_faire associés à un site_de_ruines
    public function getChoses_a_faire($idSite_de_ruines = NULL) {
        if ($idSite_de_ruines == NULL) {
            $sql = 'SELECT c.id,'
                    . ' c.site_de_ruines_id,'
                    . ' c.nom,'
                    . ' c.description,'
                    . ' c.efface,'
                    . ' s.nom as nomSite'
                    . ' FROM choses_a_faire c'
                    . ' INNER JOIN sites_de_ruines s'
                    . ' ON c.site_de_ruines_id = s.id'
                    . ' ORDER BY id desc';;
        } else {
            $sql = 'SELECT * from choses_a_faire'
                    . ' WHERE site_de_ruines_id = ?'
                    . ' ORDER BY id desc';;
        }
        $choses_a_faire = $this->executerRequete($sql, [$idSite_de_ruines]);
        return $choses_a_faire;
    }

    // Renvoie la liste des choses_a_faire publics associés à un site_de_ruines
    public function getChoses_a_fairePublics($idSite_de_ruines = NULL) {
        if ($idSite_de_ruines == NULL) {
            $sql = 'SELECT c.id,'
                    . ' c.site_de_ruines_id,'
                    . ' c.nom,'
                    . ' c.description,'
                    . ' c.efface,'
                    . ' s.nom as nomSite'
                    . ' FROM choses_a_faire c'
                    . ' INNER JOIN sites_de_ruines s'
                    . ' ON c.site_de_ruines_id = s.id'
                    . ' WHERE c.efface = 0'
                    . ' ORDER BY id desc';
        } else {
            $sql = 'SELECT * FROM choses_a_faire'
                    . ' WHERE site_de_ruines_id = ? AND efface = 0'
                    . ' ORDER BY id desc';;
        }
        $choses_a_faire = $this->executerRequete($sql, [$idSite_de_ruines]);
        return $choses_a_faire;
    }

// Renvoie un chose_a_faire spécifique
    public function getChose_a_faire($id) {
        $sql = 'SELECT * FROM choses_a_faire'
                . ' WHERE id = ?';
        $chose_a_faire = $this->executerRequete($sql, [$id]);
        if ($chose_a_faire->rowCount() == 1) {
            return $chose_a_faire->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun chose_a_faire ne correspond à l'identifiant '$id'");
        }
    }

// Supprime un chose_a_faire
    public function deleteChose_a_faire($id) {
        $sql = 'UPDATE choses_a_faire'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    // Réactive un chose_a_faire
    public function restorechose_a_faire($id) {
        $sql = 'UPDATE choses_a_faire'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

// Ajoute un chose_a_faire associés à un site_de_ruines
    public function setChose_a_faire($chose_a_faire) {
        $sql = 'INSERT INTO choses_a_faire ('
                . 'site_de_ruines_id,'
                . ' nom,'
                . ' description)'
                . ' VALUES(?, ?, ?)';
        $result = $this->executerRequete($sql, [
            $chose_a_faire['site_de_ruines_id'],
            $chose_a_faire['nom'],
            $chose_a_faire['description']
                ]
        );
        return $result;
    }

}
