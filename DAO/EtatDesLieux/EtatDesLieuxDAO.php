<?php

namespace DAO\EtatDesLieuxDAO;

use Models\BasePDODAO;
require_once(__DIR__."/I_EtatDesLieuxDAO.php");
require_once(__DIR__."/../../Model/EtatDesLieux.php");
use model\EtatDesLieux;
use DAO\I_EtatDesLieuxDAO;
use PDO;

/**
 * Classe DAO de la table Unit
 */
class EtatDesLieuxDAO extends BasePDODAO implements I_EtatDesLieuxDAO {
    public function getById(string $idUnit) : ?EtatDesLieux {

        // On met en place la requête
        $requete = "SELECT * FROM EtatDesLieux WHERE id = :id";

        // On exécute la requête
        $reponse = $this->execRequest($requete, array("id"=> $idUnit));

        $unit = null;

        // Si on a bien obtenu une ligne, on retournera un Unit
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $unit = new EtatDesLieux();
            $unit->hydrate($row);
        }

        // On retourne l'Unit
        return $unit;
    }

    public function Create(EtatDesLieux $etatDesLieux) {
        // On prépare la requête d'insertion
        $requete = "INSERT INTO EtatDesLieux (dateEntree,dateSortie,type,media,bailleur) VALUES (:dateEntree,:dateSortie,:type,:media,:bailleur)";

        // On prépare les données à insérer
        $donnees = array(
            "dateEntree" => $etatDesLieux->getDateEntree(),
            "dateSortie" => $etatDesLieux->getDateSortie(),
            "type" => $etatDesLieux->getType(),
            "media" => $etatDesLieux->getMedia(),
            "bailleur"=> $etatDesLieux->getBailleur()
        );

        // On exécute la requête
        $this->execRequest($requete, $donnees);
    }
    public function Update(EtatDesLieux $etatDesLieux) {
        $requete = "UPDATE EtatDesLieux SET dateEntree = :dateEntree, dateSortie = :dateSortie, type = :type, media = :media, bailleur = :bailleur WHERE id = :id";
        $donnees = array(
            "id" => $etatDesLieux->getId(),
            "dateEntree" => $etatDesLieux->getDateEntree(),
            "dateSortie" => $etatDesLieux->getDateSortie(),
            "type" => $etatDesLieux->getType(),
            "media" => $etatDesLieux->getMedia(),
            "bailleur" => $etatDesLieux->getBailleur()
        );
    
        // On exécute la requête
        $this->execRequest($requete, $donnees);
    }

    public function Delete(int $id) {
        $requete = "DELETE FROM EtatDesLieux WHERE id = :id";
    
        $donnees = array(
            "id" => $id
        );
        $this->execRequest($requete, $donnees);
    }
}
?>