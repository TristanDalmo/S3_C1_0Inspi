<?php

namespace TestUnitaire\TestBDD\EtatDesLieux\TestEtatDesLieux;
require_once(__DIR__ . "/../../../DAO/EtatDesLieux/EtatDesLieuxDAO.php");///../DAO/EtatDesLieux/EtatDesLieuxDAO.php
require_once(__DIR__ . "/../../../Model/EtatDesLieux.php");
require_once(__DIR__ . "/../../../Model/Logement.php");
require_once(__DIR__ . "/../../../Model/Personne.php");
require_once(__DIR__ . "/../../../Model/TypePiece.php");
use DAO\EtatDesLieuxDAO\EtatDesLieuxDAO;
use Model\EtatDesLieux;
use Model\Logement;
use Model\Personne;
require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestEtatDesLieux extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Etat des lieux</h2>",
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
        $etatDesLieuxDAO=new EtatDesLieuxDAO();
        $etatDesLieux=$etatDesLieuxDAO->getById(1);
        /*
         echo "Bailleur  " .  ($etatDesLieux->getBailleur()->getIdPersonne());
        echo "\n Id logement : " . ($etatDesLieux->getLogement()->getIdLogement());
        echo "\n Id etat des lieux : " . ($etatDesLieux->getIdEtatDesLieux()); */

        // Variable de retour
        $retour = "";

        if (
            ($etatDesLieux->getType()=="Entrée") && ($etatDesLieux->getBailleur()->getIdPersonne()==1)
            && ($etatDesLieux->getDateEntree()=="2024-01-01")&& ($etatDesLieux->getDateSortie()==null)
            && ($etatDesLieux->getIdEtatDesLieux()==1) && ($etatDesLieux->getLogement()->getIdLogement()==1)
            && ($etatDesLieux->getMedia()=="photos_entree.zip")
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

    /**
     * Test de la méthode Insert
     * @return string Message de retour
     */
    private function TestInsert(): string {

        // Création de l'état des lieux
        $etatDesLieux=new EtatDesLieux();
        $etatDesLieux->setDateEntree("02-05-2032");
        $etatDesLieux->setDateSortie("05-06-2069");
        $etatDesLieux->setType("Entrée");
        $etatDesLieux->setMedia("test.txt");
        $logement=new Logement() ;
        $etatDesLieux->setidLogement($logement);
        $personne=new Personne();
        $etatDesLieux->setidPersonne($personne);

        $edlDAO = new EtatDesLieuxDAO();

        $retour = "";

        try {
            $this->idCree = $edlDAO->Create($etatDesLieux);
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
        $edlDAO = new EtatDesLieuxDAO();
        $edl = $edlDAO->GetbyId(2);

        $retour = "";

        try {
            $ancienncevaleur = $edl->getMedia();
            // Variable aléatoire 
            $edl->setMedia(time() . uniqid());
            $edlDAO->Update($edl);
            if ($ancienncevaleur != $edlDAO->getById(2)->getMedia()) {
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

        $edlDAO = new EtatDesLieuxDAO();

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


$test = new TestEtatDesLieux();
$result = $test->Execute();

foreach ( $result as $row ) {
    echo $row . "<br/>"; }

?>