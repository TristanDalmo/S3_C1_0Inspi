<?php

namespace DAO\GestionFormulaire;

#region Usings 
require_once(__DIR__ . "/I_InsertionEDLDAO.php");
use DAO\GestionFormulaire\I_InsertionEDLDAO;

require_once(__DIR__ . "/../EtatDesLieux/EtatDesLieuxDAO.php");
require_once(__DIR__ . "/../EtatDesLieux/LocataireDAO.php");
require_once(__DIR__ . "/../EtatDesLieux/LogementDAO.php");
require_once(__DIR__ . "/../EtatDesLieux/PersonneDAO.php");
require_once(__DIR__ . "/../Piece/ElectromenagerDAO.php");
require_once(__DIR__ . "/../Piece/ElementsDAO.php");
require_once(__DIR__ . "/../Piece/PieceDAO.php");
require_once(__DIR__ . "/../Piece/PrisesDAO.php");
use DAO\EtatDesLieux\EtatDesLieuxDAO;
use DAO\EtatDesLieux\LocataireDAO;
use DAO\EtatDesLieux\LogementDAO;
use DAO\EtatDesLieux\PersonneDAO;
use DAO\Piece\ElectromenagerDAO;
use DAO\Piece\PieceDAO;
use DAO\Piece\PrisesDAO;
use DAO\Piece\ElementsDAO;

require_once(__DIR__ . "/../../Model/Electromenager.php");
require_once(__DIR__ . "/../../Model/Elements.php");
require_once(__DIR__ . "/../../Model/Personne.php");
require_once(__DIR__ . "/../../Model/EtatDesLieux.php");
require_once(__DIR__ . "/../../Model/Locataire.php");
require_once(__DIR__ . "/../../Model/Logement.php");
require_once(__DIR__ . "/../../Model/Piece.php");
require_once(__DIR__ . "/../../Model/TypePiece.php");
require_once(__DIR__ . "/../../Model/Prises.php");
use Model\Electromenager;
use Model\Elements;
use Model\Personne;
use Model\EtatDesLieux;
use Model\Locataire;
use Model\Logement;
use Model\Piece;
use Model\TypePiece;
use Model\Prises;

#endregion 


/**
 * Classe servant à insérer des données dans la base de données
 */
class InsertionEDLDAO implements I_InsertionEDLDAO {


    public function InsererEDL(array $donnees) {

        # region Initialisation des DAO

        $etatDesLieuxDAO = new EtatDesLieuxDAO();
        $locataireDAO = new LocataireDAO();
        $logementDAO = new LogementDAO();
        $personneDAO = new PersonneDAO();
        $electromenagerDAO = new ElectromenagerDAO();
        $pieceDAO = new PieceDAO();
        $prisesDAO = new PrisesDAO();
        $elementsDAO = new ElementsDAO();
        
        #endregion 
        
        #region Insertions dans la BDD

        $logement = new Logement();
        $logement->setNbPiece($donnees['']);
        $logement->setAdresse($donnees['']);
        $logement->setSurface($donnees['']);
        $logement->setType($donnees['']);

        $logementDAO->Create($logement);







        #endregion





    }
}





?>