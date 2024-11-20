<?php

namespace TestUnitaire\TestBDD\EtatDesLieux;
require_once(__DIR__ . "/../../../DAO/EtatDesLieux/PersonneDAO.php");
require_once(__DIR__ . "/../../../Model/Personne.php");
use DAO\EtatDesLieux\PersonneDAO;
use Model\Personne;
require_once(__DIR__ . "/../../AbstractTestUnitaire.php");
use TestUnitaire\AbstractTestUnitaire;
use Exception;

class TestPersonne extends AbstractTestUnitaire {

    // Id de l'élément créé dans GetbyId
    private int $idCree;

    public function Execute() : array {

        // On retourne un tableau des résultats
        return [
            "<h2>Tests unitaire de la classe Personne</h2>",
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
        $personneDAO=new PersonneDAO();
        $personne=$personneDAO->getById(1);

        // Variable de retour
        $retour = "";

        if (
            ($personne->getIdPersonne()==1) &&($personne->getCivilite()=="M.")
            &&($personne->getPrenom()=="Jean")&&($personne->getNom()=="Dupont")
            &&($personne->getAdresse()=="10 Rue des Lilas, Nantes")
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
        $personne=new Personne();
        $personne->setIdPersonne(4);
        $personne->setCivilite("Mme");
        $personne->setPrenom("Matteo");
        $personne->setNom("De Marco");
        $personne->setAdresse("hddgdhghg");

        $personneDAO = new PersonneDAO();

        $retour = "";

        try {
            $this->idCree = $personneDAO->Create($personne);
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
        $personneDAO = new PersonneDAO();
        $personne = $personneDAO->GetbyId(2);

        $retour = "";

        try {
            $ancienncevaleur = $personne->getAdresse();
            // Variable aléatoire 
            $personne->setAdresse(time() . uniqid());
            $personneDAO->Update($personne);
            if ($ancienncevaleur != $personneDAO->getById(2)->getAdresse()) {
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

        $personneDAO = new PersonneDAO();

        $retour = "";

        try {
            // On supprime l'élément créé dans le test insert
            $personneDAO->Delete($this->idCree);

            $retour = "<p class='reussi'>Test de Delete : Test réussi </p>";

        }
        catch (Exception $e) {
            $retour = "<p class='echoue'>Test de Delete : Test échoué. Cause : ". $e->getMessage() ."</p>";
        }      

        return $retour;
    }

}

?>