<?php
namespace TestUnitaire;

require_once("../DAO/EtatDesLieux/EtatDesLieuxDAO.php");
require_once("../Model/EtatDesLieux.php");
require_once("../Model/Logement.php");
require_once("../Model/Personne.php");
require_once("../Model/TypePiece.php");

use DAO\EtatDesLieuxDAO\EtatDesLieuxDAO;
use Model\EtatDesLieux;
use Model\Logement;
use Model\Personne;
use Model\TypePiece;

class TestEtatDesLieux{
    /**
     * Réalise les tests de la classe
     * @return void
     */
    public static function main(){
        $renvoie="";
        echo "Test de l'état des lieux: ";
        echo "<br>";
        echo "testGetByID: ";
        if (TestEtatDesLieux::TestGetById(1)){
            $renvoie="Test passé avec succès";
        }
        else{
            $renvoie= "Echec du test";
        }
        echo $renvoie;
    }
    private static function CreerEtatDesLieux(): EtatDesLieux {
        $etatDesLieux=new EtatDesLieux();
        $etatDesLieux->setDateEntree("02-05-2032");
        $etatDesLieux->setDateSortie("05-06-2069");
        $etatDesLieux->setType("Entrée");
        $etatDesLieux->setMedia("test.txt");
        $logement=new Logement() ;
        $etatDesLieux->setidLogement($logement);
        $personne=new Personne();
        $etatDesLieux->setidPersonne($personne);
        return $etatDesLieux;
    }

    private static function TestGetById(int $id):bool{
        

        // recuperation de l'etat des lieux créer precdement 
        $etatDesLieuxDAO=new EtatDesLieuxDAO();
        $etatDesLieux=$etatDesLieuxDAO->getById($id);
        echo "Bailleur  " .  ($etatDesLieux->getBailleur()->getIdPersonne());
        echo "\n Id logement : " . ($etatDesLieux->getLogement()->getIdLogement());
        echo "\n Id etat des lieux : " . ($etatDesLieux->getIdEtatDesLieux());
        return (
            ($etatDesLieux->getType()=="Entrée") && ($etatDesLieux->getBailleur()->getIdPersonne()==1)
            && ($etatDesLieux->getDateEntree()=="2024-01-01")&& ($etatDesLieux->getDateSortie()==null)
            && ($etatDesLieux->getIdEtatDesLieux()==1) && ($etatDesLieux->getLogement()->getIdLogement()==1)
            && ($etatDesLieux->getMedia()=="photos_entree.zip")
        );
        

    }

    private static function TestInsertion(){  
        $etatDesLieux=TestEtatDesLieux::CreerEtatDesLieux() ;
        $etatDesLieuxDAO=new EtatDesLieuxDAO();
        //$etatDesLieux_recupereID=$etatDesLieuxDAO->Create($etatDesLieux);
        


    }

    

}

TestEtatDesLieux::main();

?>