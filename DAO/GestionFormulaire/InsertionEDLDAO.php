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

        // Création du logement dans la BDD
        $logement = new Logement();
        $logement->setNbPiece($donnees['nbpiece']);
        $logement->setAdresse($donnees['adresse']);
        $logement->setSurface($donnees['SURFACE']);
        $logement->setType($donnees['typeLogement']);

        // Insertion du logement et stock de son identifiant unique
        $idLogement = $logementDAO->Create($logement);

        // Création d'une personne
        $personne = new Personne();
        $personne->setNom($donnees['nom_locataire']);
        $personne->setPrenom($donnees['prenom_locataire']);
        $personne->setAdresse($donnees['adresse_locataire']);
        $personne->setCivilite($donnees['civilite_locataire']);

        // Gestion de la création d'une personne
        $idPersonne = null;
        if (($result = $personneDAO->GetByNomPrenomAdresse($personne)) != null) {
            $idPersonne = $result->getidPersonne();
        }
        else {
            $idPersonne = $personneDAO->Create($personne);
        }

        // Création d'un bailleur pour l'état des lieux
        $bailleur = new Personne();
        $bailleur->setNom($donnees['nom_bailleur']);
        $bailleur->setPrenom($donnees['prenom_bailleur']);
        $bailleur->setAdresse($donnees['adresse_bailleur']);
        $bailleur->setCivilite($donnees['civilite_bailleur']);

        // Gestion de la création d'un bailleur
        $idBailleur = null;
        if (($resultBailleur = $personneDAO->GetByNomPrenomAdresse($bailleur)) != null) {
            $idBailleur = $resultBailleur->getidPersonne();
        }
        else {
            $idBailleur = $personneDAO->Create($bailleur);
        }

        // Création d'un état des lieux
        $etatDesLieux = new EtatDesLieux();
        $etatDesLieux->setdateEntree($donnees['']);
        $etatDesLieux->setdateSortie($donnees['']);
        $etatDesLieux->setMedia($donnees['']);
        $etatDesLieux->setType($donnees['']);
        $etatDesLieux->setidLogement($idLogement);
        $etatDesLieux->setidPersonne($idBailleur);
        
        $idEtatDesLieux = $etatDesLieuxDAO->Create($etatDesLieux);

        // Création d'un locataire sur un état des lieux
        $locataire = new Locataire();
        $locataire->setidEtatDesLieux($idEtatDesLieux);
        $locataire->setidPersonne($idPersonne);

        $locataireDAO->Create($locataire);




        #endregion





    }
}





?>