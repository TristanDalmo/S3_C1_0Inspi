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

    public static function TestGetById(int $id){
        // initialisation d'un etat des lieux 
        $etatDesLieux=new EtatDesLieux();
        $etatDesLieux->setDateEntree("02-05-2032");
        $etatDesLieux->setDateSortie("05-06-2069");
        $type= new TypePiece();
        $etatDesLieux->setType($type);
        $etatDesLieux->setMedia("truc.txt");
        $logement=new Logement() ;
        $etatDesLieux->setLogement($logement);
        $personne=new Personne();
        $etatDesLieux->setBailleur($personne);
        $etatDesLieuxDAO=new EtatDesLieuxDAO();
        $etatDesLieuxDAO->Create($etatDesLieux);
        

        // recuperation de l'etat des lieux créer precdement 
        $etatDesLieuxDAO2=new EtatDesLieuxDAO();
        $etatDesLieux2=$etatDesLieuxDAO2->getById($id);


        
        echo (($etatDesLieux->getType())==($etatDesLieux2->getType()));
        

    }

    public static function TestInsertion(EtatDesLieux $etatDesLieux){  
        $etatDesLieuxDAO=new EtatDesLieuxDAO();
        $etatDesLieuxDAO->Create($etatDesLieux);

    }

    

}

TestEtatDesLieux::TestGetById(1);

?>