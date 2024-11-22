<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__."/../../Model/Logement.php");
use Model\Logement;
require_once(__DIR__."/I_LogementDAO.php");
use DAO\EtatDesLieux\I_LogementDAO;
use PDO;

/**
 * Classe DAO de la table Logement
 */
class LogementDAO extends BasePDODAO implements I_LogementDAO {

    public function Create(Logement $logement): int {
        // On prépare la requête d'insertion
        $requete = "INSERT INTO Logement (type, surface, nbPiece, adresse) VALUES (:type, :surface, :nbPiece, :adresse)";

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
        $this->verificationResultat($reponse,
        "Le logement a été ajouté avec succès",
        "Aucun logement n'a été ajouté",
        "Erreur lors de la tentative d'ajout du logement");
    
        // Variable de retour (id de l'élément inserré)
        $retour = $this->getlastInsertId();
        
        // Retour de la variable
        return $retour;
    }
    
    public function Update(Logement $logement) {

        $requete = "UPDATE Logement SET type = :type, surface = :surface, nbPiece = :nbPiece, adresse = :adresse WHERE idLogement = :idLogement";
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
        $this->verificationResultat($reponse,
        "Logement mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour le logement",
        true);
    }

    public function Delete(int $id) {

        $requete = "DELETE FROM Logement WHERE idLogement = :idLogement";
    
        $donnees = array(
            "idLogement" => $id
        );
        
        // Exécution de la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "Le logement a été supprimé avec succès",
        "Aucun logement n'a été supprimé",
        "Erreur lors de la tentative de suppression de le logement");
    }

    public function getById(int $id) : Logement {

        // On met en place la requête
        $requete = "SELECT * FROM Logement WHERE idLogement = :idLogement";

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