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

    public function Create(Piece $piece) : int
    {
        // Mise en place de la requête
        $requete = "INSERT INTO PIECE(idTypePiece,idPrises,idElectromenager,idLogement) VALUES (:idTypePiece,:idPrises,:idElectromenager,:idLogement)";
        $parameters = array(
            "idTypePiece" => $piece->getTypePiece()?->getIdTypePiece() ?? null,
            "idPrises" => $piece->getPrises()?->getIdPrises() ?? null,
            "idElectromenager" => $piece->getElectromenager()?->getIdElectromenager() ?? null,
            "idLogement" => $piece->getLogement()?->getIdLogement() ?? null
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "La pièce a été ajouté avec succès",
        "Aucune pièce n'a été ajouté",
        "Erreur lors de la tentative d'ajout de la pièce");

        // Variable de retour (id de l'élément inserré)
        $retour = $this->getlastInsertId();
        
        // Retour de la variable
        return $retour;
    }


    public function Update(Piece $piece)
    {
        // Mise en place de la requête
        $requete = "UPDATE PIECE SET idTypePiece = :idTypePiece, idPrises = :idPrises, idElectromenager = :idElectromenager , idLogement = :idLogement WHERE idPiece = :idPiece";
        $parameters = array(
            "idTypePiece" => $piece->getTypePiece()?->getIdTypePiece() ?? null,
            "idPrises" => $piece->getPrises()?->getIdPrises() ?? null,
            "idElectromenager" => $piece->getElectromenager()?->getIdElectromenager() ?? null,
            "idLogement" => $piece->getLogement()?->getIdLogement() ?? null,
            "idPiece" => $piece->getIdPiece()
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "Pièce mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour la pièce");
    }

    public function Delete(int $id) 
    {
        // Mise en place de la requête
        $requete = "DELETE FROM PIECE WHERE idPiece = :idPiece";
        $parameters = array("idPiece"=>$id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "La pièce a été supprimé avec succès",
        "Aucune pièce n'a été supprimé",
        "Erreur lors de la tentative de suppression de la pièce");
    }

    public function getById(int $id) : Piece{

        // Mise en place de la requête
        $requete = "SELECT * FROM PIECE WHERE idPiece = :idPiece";
        $parameters = array("idPiece" => $id);

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