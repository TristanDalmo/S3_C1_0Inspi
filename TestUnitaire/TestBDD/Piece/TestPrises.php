<?php

namespace TestUnitaire\TestBDD\Piece;

require_once(__DIR__ . "/../../../DAO/Piece/PrisesDAO.php");
require_once(__DIR__ . "/../../../Model/Prises.php");
use DAO\Piece\PrisesDAO;
use Model\Prises;

require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestPrises extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Prises</h2>",
            $this->TestGetById(),
            $this->TestInsert(),
            $this->TestUpdate(),
            $this->TestDelete()
        ];
    }


    private function TestGetById():string{
        
        $prisesDAO=new PrisesDAO();
        $prises=$prisesDAO->getById(1);

        // Variable de retour
        $retour = "";

        if ( ($prises->getDescription() == "Prises murales salon")
            && ($prises->getNombrePrises() == 4)
            && ($prises->getEtatEntree() == "A")
            && ($prises->getEtatSortie() == ""))
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
        $prises = new Prises();
        $prises->setDescription("Projuierugzogbzr");
        $prises->setNombrePrises(6);
        $prises->setEtatEntree("TB");
        $prises->setEtatSortie("B");


        $prisesDAO=new PrisesDAO();

        $retour = "";

        try {
            $this->idCree = $prisesDAO->Create($prises);
            $retour = "<p class='reussi'>Test de Insert : Test réussi </p>";
        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Insert : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }
        

        return $retour;
    }


    private function TestUpdate(): string {

        // On reprend l'élément précédent et on le met à jour
        $prisesDAO=new PrisesDAO();
        $prises = $prisesDAO->GetbyId(2);

        $retour = "";

        try {
            $anciennevaleur = $prises->getDescription();
            // Variable aléatoire 
            $prises->setDescription(time() . uniqid());

            $prisesDAO->Update($prises);
            if ($anciennevaleur == $prisesDAO->getById(2)->getDescription()) {
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

        $prisesDAO = new PrisesDAO();

        $retour = "";

        try {
            // On supprime l'élément créé dans le test insert
            $prisesDAO->Delete($this->idCree);

            $retour = "<p class='reussi'>Test de Delete : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Delete : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

}

?>