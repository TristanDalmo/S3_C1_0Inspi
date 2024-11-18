<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__."../../Model/Locataire.php");
use Model\Locataire;
require_once(__DIR__."./I_LocataireDAO.php");
use DAO\EtatDesLieux\I_LocataireDAO;
use PDO;

/**
 * Classe DAO de la table Locataire
 */
class LocataireDAO extends BasePDODAO implements I_LocataireDAO {

    public function Create(Locataire $locataire): string {

        // On prépare la requête d'insertion
        $requete = "INSERT INTO LOCATAIRE (idPersonne,idEtatDesLieux) VALUES (:idPersonne,:idEtatDesLieux)";

        // On prépare les données à insérer
        $donnees = array(
            "idPersonne"=>$locataire->getLocataire()->getIdPersonne(),
            "idEtatDesLieux"=>$locataire->getEtatDesLieux()->getIdEtatDesLieux()
        );

        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Le locataire a été ajouté avec succès",
        "Aucun locataire n'a été ajouté",
        "Erreur lors de la tentative d'ajout du locataire");
    
        // Retour de la variable
        return $reponse;
    }
    
    public function Delete(int $idPersonne, int $idEtatDesLieux) : string {

        $requete = "DELETE FROM LOGEMENT WHERE idPersonne = :idPersonne, idEtatDesLieux = :idEtatDesLieux";
    
        $donnees = array(
            "idLogement" => $idPersonne,
            "idEtatDesLieux" => $idEtatDesLieux
        );
        
        // Exécution de la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Le locataire a été supprimé avec succès",
        "Aucun locataire n'a été supprimé",
        "Erreur lors de la tentative de suppression de le locataire");
    
        // Retour de la variable
        return $reponse;
    }

    public function getById(int $idPersonne, int $idEtatDesLieux) : Locataire {

        // On met en place la requête
        $requete = "SELECT * FROM LOGEMENT WHERE idPersonne = :idPersonne, idEtatDesLieux = :idEtatDesLieux";
        $donnees = array(
            "idLogement" => $idPersonne,
            "idEtatDesLieux" => $idEtatDesLieux
        );

        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        $locataire = null;

        // Si on a bien obtenu une ligne, on retournera un locataire
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $locataire = new Locataire();
            $locataire->hydrate($row);
        }

        // On retourne le locataire
        return $locataire;
    }


}

?>