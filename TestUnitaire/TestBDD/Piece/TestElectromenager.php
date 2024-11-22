<?php

namespace TestUnitaire\TestBDD\Piece;

require_once(__DIR__ . "/../../../DAO/Piece/ElectromenagerDAO.php");
require_once(__DIR__ . "/../../../Model/Electromenager.php");
use DAO\Piece\ElectromenagerDAO;
use Model\Electromenager;

require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestElectromenager extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Electroménager</h2>",
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
        
        // recuperation de l'etat des lieux créer precdement 
        $electromenagerDAO=new ElectromenagerDAO();
        $electromenager=$electromenagerDAO->getById(1);

        // Variable de retour
        $retour = "";

        if ( ($electromenager->getNomElectromenager() == "Réfrigérateur") 
            && ($electromenager->getDescription() == "Réfrigérateur combiné 250L")
            && ($electromenager->getEtatEntree() == "B") 
            && ($electromenager->getEtatSortie() == "") )
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

        // Création de l'électroménager
        $electromenager = new Electromenager();
        $electromenager->setEtatEntree("A");
        $electromenager->setEtatSortie("B");
        $electromenager->setDescription("Electro");
        $electromenager->setNomElectromenager("Eleeeee");

        $electroDAO = new ElectromenagerDAO();

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
        $edlDAO = new ElectromenagerDAO();
        $edl = $edlDAO->GetbyId(2);

        $retour = "";

        try {
            $ancienncevaleur = $edl->getDescription();
            // Variable aléatoire 
            $edl->setDescription(time() . uniqid());
            $edlDAO->Update($edl);
            if ($ancienncevaleur == $edlDAO->getById(2)->getDescription()) {
                throw new Exception("La modification n'a pas été effectuée");
            }

            $retour = "<p class='reussi'>Test d'Update : Test réussi </p>";
            
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

        $edlDAO = new ElectromenagerDAO();

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