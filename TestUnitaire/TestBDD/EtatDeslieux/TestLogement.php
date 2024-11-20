<?php

namespace TestUnitaire\TestBDD\EtatDesLieux;
require_once(__DIR__ . "/../../../DAO/EtatDesLieux/LogementDAO.php");
require_once(__DIR__ . "/../../../Model/Logement.php");
use DAO\EtatDesLieux\LogementDAO;
use Model\Logement;
require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestLogement extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Logement</h2>",
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
        $LogementDAO=new LogementDAO();
        $logement=$LogementDAO->getById(1);
        /*
         echo "Bailleur  " .  ($etatDesLieux->getBailleur()->getIdPersonne());
        echo "\n Id logement : " . ($etatDesLieux->getLogement()->getIdLogement());
        echo "\n Id etat des lieux : " . ($etatDesLieux->getIdEtatDesLieux()); */

        // Variable de retour
        $retour = "";

        if (
             ($logement->getIdLogement()==1)&&($logement->getType()=="Appartement")
             &&($logement->getSurface()==75.5)&&($logement->getNbPiece()==3)
             &&($logement->getAdresse()=="123 Rue de la Paix, Paris")
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
        $logement=new Logement();
        $logement->setIdLogement(4);
        $logement->setType("Maison");
        $logement->setSurface(80);
        $logement->setNbPiece(4);
        $logement->setAdresse("adresse fictive");

        $logementDAO = new LogementDAO();

        $retour = "";

        try {
            $this->idCree = $logementDAO->Create($logement);
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
        $logementDAO = new LogementDAO();
        $logement = $logementDAO->GetbyId(2);

        $retour = "";

        try {
            $ancienncevaleur = $logement->getAdresse();
            // Variable aléatoire 
            $logement->setAdresse(time() . uniqid());
            $logementDAO->Update($logement);
            if ($ancienncevaleur != $logementDAO->getById(2)->getAdresse()) {
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

        $logementDAO = new LogementDAO();

        $retour = "";

        try {
            // On supprime l'élément créé dans le test insert
            $logementDAO->Delete($this->idCree);

            $retour = "<p class='reussi'>Test de Delete : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Delete : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

}

?>