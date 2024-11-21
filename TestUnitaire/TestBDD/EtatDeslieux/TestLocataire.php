<?php

namespace TestUnitaire\TestBDD\EtatDesLieux;

use Model\Locataire;
require_once(__DIR__ . "/../../../DAO/EtatDesLieux/LocataireDAO.php");
require_once(__DIR__ . "/../../../Model/Locataire.php");

use DAO\EtatDesLieux\LocataireDAO;
require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestLocataire extends AbstractTestUnitaire {

    private Locataire $LocataireStocke;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Locataire</h2>",
            $this->TestGetById(),
            $this->TestInsert(),
            $this->TestDelete()
        ];
    }

    private function TestGetById():string{
        
        // recuperation du locataire créer precdement 
        $LocataireDAO=new LocataireDAO();
        $locataire=$LocataireDAO->getById(1,1);
        if ($locataire==null){
            throw new Exception("Locataire est null");
        }

        // Variable de retour
        $retour = "";

        if (
            ($locataire->getEtatDesLieux()->getIdEtatDesLieux()==1)&&($locataire->getLocataire()->getIdPersonne()== 1)
        )
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

        // Création de l'état des lieux
        $locataire=new Locataire();
        $locataire->setidEtatDesLieux(1);
        $locataire->setidPersonne(3);
        $locataireDAO = new LocataireDAO();

        $retour = "";

        try {
            $locataireDAO->Create($locataire);
            $retour = "<p class='reussi'>Test de Insert : Test réussi </p>";
            $this->LocataireStocke=$locataire;
        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Insert : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }
        

        return $retour;
    }

    private function TestDelete(): string {

        $locataireDAO = new LocataireDAO();

        $retour = "";

        try {
            // On supprime l'élément créé dans le test insert
            $locataireDAO->Delete($this->LocataireStocke->getLocataire()->getIdPersonne(),$this->LocataireStocke->getEtatDesLieux()->getIdEtatDesLieux());

            $retour = "<p class='reussi'>Test de Delete : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Delete : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

}

?>