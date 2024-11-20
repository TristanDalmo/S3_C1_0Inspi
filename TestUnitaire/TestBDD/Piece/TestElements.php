<?php

namespace TestUnitaire\TestBDD\Piece;

require_once(__DIR__ . "/../../../DAO/Piece/ElementsDAO.php");
require_once(__DIR__ . "/../../../Model/Elements.php");
use DAO\Piece\ElementsDAO;
use Model\Elements;

require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestElements extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Éléments</h2>",
            $this->TestGetById(),
            $this->TestInsert(),
            $this->TestUpdate(),
            $this->TestDelete()
        ];
    }

    /**
     * Test de la méthode Get By Id
     * @return string Message de retour
     */
    private function TestGetById():string{
        
        // recuperation de l'élément créé précédemment
        $elementsDAO=new ElementsDAO();
        $elements=$elementsDAO->getById(1);

        // Variable de retour
        $retour = "";

        if ( ($elements->getDescription() == "Mur peint en blanc") 
            && ($elements->getTypeElement() == "Mur")
            && ($elements->getEtatEntree() == "A") 
            && ($elements->getEtatSortie() == "")
            && ($elements->getPiece() !== null && $elements->getPiece()?->getIdPiece() == 1))
        {
            $retour = "<p class='reussi'>Test de GetById : Test réussi </p>";
        }
        else 
        {
            $retour .= "<p class='echoue'>Test de GetById : Test échoué </p>";
        }

        return $retour; 
    }

    /**
     * Test de la méthode Insert
     * @return string Message de retour
     */
    private function TestInsert(): string {

        // Création de l'élément
        $electromenager = new Elements();
        $electromenager->setTypeElement("PAPIERPAEINT");
        $electromenager->setEtatEntree("A");
        $electromenager->setEtatSortie("B");
        $electromenager->setDescription("element");
        $electromenager->setidPiece(2);

        $electroDAO = new ElementsDAO();

        $retour = "";

        try {
            $this->idCree = $electroDAO->Create($electromenager);
            $retour = "<p class='reussi'>Test de Insert : Test réussi </p>";
        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Insert : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }
        

        return $retour;
    }

    /**
     * Test de la méthode Update
     * @return string Retour
     */
    private function TestUpdate(): string {

        // On reprend l'élément précédent et on le met à jour
        $elementDAO = new ElementsDAO();
        $element = $elementDAO->GetbyId(2);

        $retour = "";

        try {
            $anciennevaleur = $element->getDescription();
            // Variable aléatoire 
            $element->setDescription(time() . uniqid());


            $elementDAO->Update($element);
            if ($anciennevaleur != $elementDAO->getById(2)->getDescription()) {
                $retour = "<p class='reussi'>Test d'Update : Test réussi </p>";
            }
            else {
                throw new Exception("La modification n'a pas été effectuée");
            }

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test d'Update : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

    /**
     * Test de la méthode Update
     * @return string Retour
     */
    private function TestDelete(): string {

        $elementDAO = new ElementsDAO();

        $retour = "";

        try {
            // On supprime l'élément créé dans le test insert
            $elementDAO->Delete($this->idCree);

            $retour = "<p class='reussi'>Test de Delete : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Delete : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

}

?>