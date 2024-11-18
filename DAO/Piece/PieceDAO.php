<?php

namespace DAO\Piece;
require_once(__DIR__ . "/I_PieceDAO.php");
use DAO\Piece\I_PieceDAO;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__ . "/../../Model/Piece.php");
use Model\Piece;
use PDO;

/**
 * Classe d'interactions avec la BDD sur la table Pièce
 */
class PieceDAO extends BasePDODAO implements I_PieceDAO {

    public function Create(Piece $piece) : string
    {
        // Mise en place de la requête
        $requete = "INSERT INTO PIECE(idTypePiece,idPrises,idElectromenager,idLogement) VALUES (:idTypePiece,:idPrises,:idElectromenager,:idLogement)";
        $parameters = array(
            "idTypePiece"=>$piece->getTypePiece()->getIdTypePiece(),
            "idPrises"=>$piece->getPrises()->getIdPrises(),
            "idElectromenager"=>$piece->getElectromenager()->getIdElectromenager(),
            "idLogement"=>$piece->getLogement()->getIdLogement()     
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "La pièce a été ajouté avec succès",
        "Aucune pièce n'a été ajouté",
        "Erreur lors de la tentative d'ajout de la pièce");

        // Retour de la variable
        return $reponse;
    }


    public function Update(Piece $piece): string
    {
        // Mise en place de la requête
        $requete = "UPDATE PIECE SET idTypePiece = :idTypePiece, idPrises = :idPrises, idElectromenager = :idElectromenager , idLogement = :idLogement";
        $parameters = array(
            "idTypePiece"=>$piece->getTypePiece()->getIdTypePiece(),
            "idPrises"=>$piece->getPrises()->getIdPrises(),
            "idElectromenager"=>$piece->getElectromenager()->getIdElectromenager(),
            "idLogement"=>$piece->getLogement()->getIdLogement()     
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Pièce mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour la pièce");

        // Retour de la variable
        return $reponse;
    }

    public function Delete(int $id) : string
    {
        // Mise en place de la requête
        $requete = "DELETE FROM PIECE WHERE idPiece = :idPiece";
        $parameters = array("idPiece"=>$id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "La pièce a été supprimé avec succès",
        "Aucune pièce n'a été supprimé",
        "Erreur lors de la tentative de suppression de la pièce");

        // Retour de la variable
        return $reponse;
    }

    public function getById(int $id) : Piece{

        // Mise en place de la requête
        $requete = "SELECT * FROM ELECTROMENAGER WHERE idElectromenager = :idElectromenager";
        $parameters = array("idElectromenager" => $id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        $piece = null;

        // Si on a bien obtenu une ligne, on retournera un élément électroménager
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $piece = new Piece();
            $piece->hydrate($row);
        }

        // On retourne l'élément
        return $piece;


    }


}












?>