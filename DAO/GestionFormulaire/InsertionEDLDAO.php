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


        // création des prises de cuisine
        $priseCuisine=new Prises();
        $priseCuisine->setDescription($donnees['description_prise_electrique']);
        $priseCuisine->setEtatEntree($donnees['etat_cuisine_prise_electrique_entree']);
        $priseCuisine->setEtatSortie($donnees['etat_cuisine_prise_electrique_sortie']);
        $priseCuisine->setNombrePrises($donnees['nombre_prise_electrique']);

        $idPriseCuisine=$prisesDAO->Create($priseCuisine);

        // création electromenager
        $electromenager=new Electromenager();
        $electromenager->setDescription($donnees['description_electromenager']);
        $electromenager->setEtatEntree($donnees['etat_cuisine_electromenager_entree']);
        $electromenager->setEtatSortie($donnees['etat_cuisine_electromenager_sortie']);
        $electromenager->setNomElectromenager($donnees['electromenager_nom']);

        $idelectromenager=$electromenagerDAO->Create($electromenager);


        //création de la piece
        $cuisine=new Piece();
        $cuisine->setidTypePiece('Cuisine');
        $cuisine->setidLogement($idLogement);
        $cuisine->setidPrise($idPriseCuisine);
        $cuisine->setIdElectromenager($idelectromenager);

        $idCuisine=$pieceDAO->Create($cuisine);

        // crétion du mur de la cuisine
        $murCuisine=new Elements();
        $murCuisine->setDescription($donnees['description_mur_cuisine']);
        $murCuisine->setEtatEntree($donnees['etat_cuisine_mur_entree']);
        $murCuisine->setEtatSortie($donnees['etat_cuisine_mur_sortie']);
        $murCuisine->setTypeElement('Mur');
        $murCuisine->setidPiece($idCuisine);

        $idMurCuisine=$elementsDAO->Create($murCuisine);

        //création sol cuisine
        $solCuisine=new Elements();
        $solCuisine->setDescription($donnees['description_sol_cuisine']);
        $solCuisine->setEtatEntree($donnees['etat_cuisine_sol_entree']);
        $solCuisine->setEtatSortie($donnees['etat_cuisine_sol_sortie']);
        $solCuisine->setTypeElement('Sol');
        $solCuisine->setidPiece($idCuisine);

        $idSolCuisine=$elementsDAO->Create($solCuisine);

        //création vitrages volets
        $vitrages_voletsCuisine=new Elements();
        $vitrages_voletsCuisine->setDescription($donnees['description_vitrage_volets']);
        $vitrages_voletsCuisine->setEtatEntree($donnees['etat_cuisine_vitrage_volets_entree']);
        $vitrages_voletsCuisine->setEtatSortie($donnees['etat_cuisine_vitrage_volets_sortie']);
        $vitrages_voletsCuisine->setTypeElement('Vitrages et Volets');
        $vitrages_voletsCuisine->setidPiece($idCuisine);

        $idVitrages_voletsCuisine=$elementsDAO->Create($vitrages_voletsCuisine);

        //création plafond
        $plafondCuisine=new Elements();
        $plafondCuisine->setDescription($donnees['description_plafond_cuisine']);
        $plafondCuisine->setEtatEntree($donnees['etat_cuisine_plafond_entree']);
        $plafondCuisine->setEtatSortie($donnees['etat_cuisine_plafond_sortie']);
        $plafondCuisine->setidPiece($idCuisine);

        $idPlafondCuisine=$elementsDAO->Create($plafondCuisine);

        // creation eclairage et interrupteur
        $eclairageInterrupteurCuisine=new Elements();
        $eclairageInterrupteurCuisine->setDescription($donnees['description_eclairage_interrupteurs']);
        $eclairageInterrupteurCuisine->setEtatEntree($donnees['etat_cuisine_eclairage_interrupteurs_entree']);
        $eclairageInterrupteurCuisine->setEtatSortie($donnees['etat_cuisine_eclairage_interrupteurs_sortie']);
        $eclairageInterrupteurCuisine->setidPiece($idCuisine);

        $idEclairageInterrupteurCuisine=$elementsDAO->Create($eclairageInterrupteurCuisine);

        //creation placard et tiroir
        $placardTiroirCuisine=new Elements();
        $placardTiroirCuisine->setDescription($donnees['description_placards_tiroirs']);
        $placardTiroirCuisine->setEtatEntree($donnees['etat_cuisine_placards_tiroirs_entree']);
        $placardTiroirCuisine->setEtatSortie($donnees['etat_cuisine_placards_tiroirs_sortie']);
        $placardTiroirCuisine->setidPiece($idCuisine);

        $idPlacardTiroirCuisine=$elementsDAO->Create($placardTiroirCuisine);

        //creation evier robinneterie
        $evierRobinetterieCuisine=new Elements();
        $evierRobinetterieCuisine->setDescription($donnees['description_evier_robinetterie']);
        $evierRobinetterieCuisine->setEtatEntree($donnees['etat_cuisine_evier_robinetterie_entree']);
        $evierRobinetterieCuisine->setEtatSortie($donnees['etat_cuisine_evier_robinetterie_sortie']);
        $evierRobinetterieCuisine->setidPiece($idCuisine);

        $idEvierRobinetterieCuisine=$elementsDAO->Create($evierRobinetterieCuisine);

        //creation plaque de cuisson et four
        $plaqueFourCuisine=new Elements();
        $plaqueFourCuisine->setDescription($donnees['description_plaque_four']);
        $plaqueFourCuisine->setEtatEntree($donnees['etat_cuisine_plaque_four_entree']);
        $plaqueFourCuisine->setEtatSortie($donnees['etat_cuisine_plaque_four_sortie']);
        $plaqueFourCuisine->setidPiece($idCuisine);

        $idPlaqueFourCuisine=$elementsDAO->Create($plaqueFourCuisine);

        //creation hotte
        $hotteCuisine=new Elements();
        $hotteCuisine->setDescription($donnees['description_hotte']);
        $hotteCuisine->setEtatEntree($donnees['etat_cuisine_hotte_entree']);
        $hotteCuisine->setEtatSortie($donnees['etat_cuisine_hotte_sortie']);
        $hotteCuisine->setidPiece($idCuisine);

        $idHotteCuisine=$elementsDAO->Create($hotteCuisine);

        #endregion





    }
}





?>