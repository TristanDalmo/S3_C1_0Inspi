<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__."../../Model/Logement.php");
use Model\Logement;
require_once(__DIR__."./I_LogementDAO.php");
use DAO\EtatDesLieux\I_LogementDAO;
use PDO;

/**
 * Classe DAO de la table Logement
 */
class LogementDAO extends BasePDODAO implements I_LogementDAO {

    public function Create(Logement $logement): string {
        // On prépare la requête d'insertion
        $requete = "INSERT INTO LOGEMENT (type, surface, nbPiece, adresse) VALUES (:type, :surface, :nbPiece, :adresse)";

        // On prépare les données à insérer
        $donnees = array(
            "type" => $logement->getType(),
            "surface" => $logement->getSurface(),
            "nbPiece" => $logement->getNbPiece(),
            "adresse" => $logement->getAdresse()
        );

        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Le logement a été ajouté avec succès",
        "Aucun logement n'a été ajouté",
        "Erreur lors de la tentative d'ajout du logement");
    
        // Retour de la variable
        return $reponse;
    }
    
    public function Update(Logement $logement) : string {

        $requete = "UPDATE LOGEMENT SET type = :type, surface = :surface, nbPiece = :nbPiece, adresse = :adresse WHERE idLogement = :idLogement";
        $donnees = array(
            "type" => $logement->getType(),
            "surface" => $logement->getSurface(),
            "nbPiece" => $logement->getNbPiece(),
            "adresse" => $logement->getAdresse(),
            "idLogement" => $logement->getIdLogement()
        );
    
        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Logement mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour le logement");
        
        // Retour de la variable
        return $reponse;
    }

    public function Delete(int $id) : string {

        $requete = "DELETE FROM LOGEMENT WHERE idLogement = :idLogement";
    
        $donnees = array(
            "idLogement" => $id
        );
        
        // Exécution de la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Le logement a été supprimé avec succès",
        "Aucun logement n'a été supprimé",
        "Erreur lors de la tentative de suppression de le logement");
    
        // Retour de la variable
        return $reponse;
    }

    public function getById(int $id) : Logement {

        // On met en place la requête
        $requete = "SELECT * FROM LOGEMENT WHERE idLogement = :idLogement";

        // On exécute la requête
        $reponse = $this->execRequest($requete, array("idLogement"=> $id));

        $logement = null;

        // Si on a bien obtenu une ligne, on retournera un logement
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $logement = new Logement();
            $logement->hydrate($row);
        }

        // On retourne le logement
        return $logement;
    }


}

?>