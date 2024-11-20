<?php

namespace TestUnitaire\TestBDD\Piece;

require_once(__DIR__ . "/../../../DAO/Piece/PieceDAO.php");
require_once(__DIR__ . "/../../../Model/Piece.php");
use DAO\Piece\PieceDAO;
use Model\Piece;

require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestPiece extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Pièce</h2>",
            $this->TestGetById(),
            $this->TestInsert(),
            $this->TestUpdate(),
            $this->TestDelete()
        ];
    }


    private function TestGetById():string{
        
        $pieceDAO=new PieceDAO();
        $piece=$pieceDAO->getById(2);

        // Variable de retour
        $retour = "";

        if ( ($piece->getElectromenager()->getIdElectromenager() == 2) 
            && ($piece->getLogement()->getIdLogement() == 1)
            && ($piece->getPrises()->getIdPrises() == 2)
            && ($piece->getTypePiece()->getIdTypePiece() ==3))
        {
            $retour = "<p class='reussi'>Test de GetById : Test réussi </p>";
        }
        else 
        {
            $retour .= "<p class='echoue'>Test de GetById : Test échoué </p>";
        }

        return $retour; 
    }


    private function TestInsert(): string {

        // Création de l'électroménager
        $piece = new Piece();
        $piece->setIdElectromenager(4);
        $piece->setidLogement(1);
        $piece->setidPrise(4);
        $piece->setidTypePiece(2);

        $pieceDAO = new PieceDAO();

        $retour = "";

        try {
            $this->idCree = $pieceDAO->Create($piece);
            $retour = "<p class='reussi'>Test de Insert : Test réussi </p>";
        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Insert : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }
        

        return $retour;
    }


    private function TestUpdate(): string {

        // On reprend l'élément précédent et on le met à jour
        $edlDAO = new PieceDAO();
        $edl = $edlDAO->GetbyId(2);

        $retour = "";

        try {
            $anciennevaleur = $edl->getTypePiece()->getIdTypePiece();
            // Variable aléatoire 
            if ($edl->getTypePiece()->getIdTypePiece()==1)
            {
                $edl->setidTypePiece(2);
            }
            else {
                $edl->setidTypePiece(1);
            }

            $edlDAO->Update($edl);
            if ($anciennevaleur == $edlDAO->getById(2)->getTypePiece()->getIdTypePiece()) {
                throw new Exception("La modification n'a pas été effectuée");
            }

            $retour = "<p class='reussi'>Test d'Update : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test d'Update : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }


    private function TestDelete(): string {

        $edlDAO = new PieceDAO();

        $retour = "";

        try {
            // On supprime l'élément créé dans le test insert
            $edlDAO->Delete($this->idCree);

            $retour = "<p class='reussi'>Test de Delete : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Delete : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

}

?>