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
        
        #region Insertions dans la BDD (Cuisine)

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
        $cuisine->setidLogement($idLogement);

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
        $plafondCuisine->setTypeElement('Plafond');

        $idPlafondCuisine=$elementsDAO->Create($plafondCuisine);

        // creation eclairage et interrupteur
        $eclairageInterrupteurCuisine=new Elements();
        $eclairageInterrupteurCuisine->setDescription($donnees['description_eclairage_interrupteurs']);
        $eclairageInterrupteurCuisine->setEtatEntree($donnees['etat_cuisine_eclairage_interrupteurs_entree']);
        $eclairageInterrupteurCuisine->setEtatSortie($donnees['etat_cuisine_eclairage_interrupteurs_sortie']);
        $eclairageInterrupteurCuisine->setidPiece($idCuisine);
        $eclairageInterrupteurCuisine->setTypeElement('eclairage interrupteur');

        $idEclairageInterrupteurCuisine=$elementsDAO->Create($eclairageInterrupteurCuisine);

        //creation placard et tiroir
        $placardTiroirCuisine=new Elements();
        $placardTiroirCuisine->setDescription($donnees['description_placards_tiroirs']);
        $placardTiroirCuisine->setEtatEntree($donnees['etat_cuisine_placards_tiroirs_entree']);
        $placardTiroirCuisine->setEtatSortie($donnees['etat_cuisine_placards_tiroirs_sortie']);
        $placardTiroirCuisine->setidPiece($idCuisine);
        $placardTiroirCuisine->setTypeElement('placard et tiroir');

        $idPlacardTiroirCuisine=$elementsDAO->Create($placardTiroirCuisine);

        //creation evier robinneterie
        $evierRobinetterieCuisine=new Elements();
        $evierRobinetterieCuisine->setDescription($donnees['description_evier_robinetterie']);
        $evierRobinetterieCuisine->setEtatEntree($donnees['etat_cuisine_evier_robinetterie_entree']);
        $evierRobinetterieCuisine->setEtatSortie($donnees['etat_cuisine_evier_robinetterie_sortie']);
        $evierRobinetterieCuisine->setidPiece($idCuisine);
        $evierRobinetterieCuisine->setTypeElement('evier et robinetterie');

        $idEvierRobinetterieCuisine=$elementsDAO->Create($evierRobinetterieCuisine);

        //creation plaque de cuisson et four
        $plaqueFourCuisine=new Elements();
        $plaqueFourCuisine->setDescription($donnees['description_plaque_four']);
        $plaqueFourCuisine->setEtatEntree($donnees['etat_cuisine_plaque_four_entree']);
        $plaqueFourCuisine->setEtatSortie($donnees['etat_cuisine_plaque_four_sortie']);
        $plaqueFourCuisine->setidPiece($idCuisine);
        $plaqueFourCuisine->setTypeElement('plaque de cuisson et four');

        $idPlaqueFourCuisine=$elementsDAO->Create($plaqueFourCuisine);

        //creation hotte
        $hotteCuisine=new Elements();
        $hotteCuisine->setDescription($donnees['description_hotte']);
        $hotteCuisine->setEtatEntree($donnees['etat_cuisine_hotte_entree']);
        $hotteCuisine->setEtatSortie($donnees['etat_cuisine_hotte_sortie']);
        $hotteCuisine->setidPiece($idCuisine);
        $hotteCuisine->setTypeElement('Hotte');

        $idHotteCuisine=$elementsDAO->Create($hotteCuisine);

        #endregion

        #region Insertions dans la BDD (salle de bain 1)

        // création des prises de salle de bain
        $priseSdb1=new Prises();
        $priseSdb1->setDescription($donnees['prise_sdb1']);
        $priseSdb1->setEtatEntree($donnees['etat_prise_entree']);
        $priseSdb1->setEtatSortie($donnees['etat_prise_sortie']);
        $priseSdb1->setNombrePrises($donnees['nombre_prise_electrique']);
        $priseSdb1->setNombrePrises($donnees['nbPriseSdb1']);

        $idPriseSdb1=$prisesDAO->Create($priseSdb1);

        $salleDeBain1=new Piece();
        $salleDeBain1->setidTypePiece('Salle de bain');
        $salleDeBain1->setidLogement($idLogement);
        $salleDeBain1->setidPrise($idPriseSdb1);

        $idSalleDeBain1=$pieceDAO->Create($salleDeBain1);
        
        $murSdb1=new Elements();
        $murSdb1->setDescription($donnees['mur_sdb1']);
        $murSdb1->setEtatEntree($donnees['etat_mur_entree']);
        $murSdb1->setEtatSortie($donnees['etat_mur_sortie']);
        $murSdb1->setTypeElement('Mur');
        $murSdb1->setidPiece($idSalleDeBain1);

        $idMurSdb1=$elementsDAO->Create($murSdb1);
        

        $solSdb1=new Elements();
        $solSdb1->setDescription($donnees['sol_sdb1']);
        $solSdb1->setEtatEntree($donnees['etat_sol_entree']);
        $solSdb1->setEtatSortie($donnees['etat_sol_sortie']);
        $solSdb1->setTypeElement('sol');

        $idSolSdb1=$elementsDAO->Create($solSdb1);

        //création vitrages volets
        $vitrages_voletsSdb1=new Elements();
        $vitrages_voletsSdb1->setDescription($donnees['vitrage_sdb1']);
        $vitrages_voletsSdb1->setEtatEntree($donnees['etat_vitrage_entree']);
        $vitrages_voletsSdb1->setEtatSortie($donnees['etat_vitrage_sortie']);
        $vitrages_voletsSdb1->setTypeElement('Vitrages et Volets');
        $vitrages_voletsSdb1->setidPiece($idSalleDeBain1);

        $idVitrages_voletsSdb=$elementsDAO->Create($vitrages_voletsSdb1);

        //création plafond
        $plafondSdb1=new Elements();
        $plafondSdb1->setDescription($donnees['description_etat_plafond_sdb1']);
        $plafondSdb1->setEtatEntree($donnees['etat_plafond_sortie']);
        $plafondSdb1->setEtatSortie($donnees['etat_cuisine_plafond_sortie']);
        $plafondSdb1->setTypeElement('Plafond');
        $plafondSdb1->setidPiece($idSalleDeBain1);

        $idPlafondSdb1=$elementsDAO->Create($plafondSdb1);
        
        // creation eclairage et interrupteur
        $eclairageInterrupteurSdb1=new Elements();
        $eclairageInterrupteurSdb1->setDescription($donnees['eclairage_sdb1']);
        $eclairageInterrupteurSdb1->setEtatEntree($donnees['etat_eclairage_entree']);
        $eclairageInterrupteurSdb1->setEtatSortie($donnees['etat_eclairage_sortie']);
        $eclairageInterrupteurSdb1->setTypeElement('eclairage interrupteur');
        $eclairageInterrupteurSdb1->setidPiece($idSalleDeBain1);

        $idEclairageInterrupteurSdb1=$elementsDAO->Create($eclairageInterrupteurSdb1);

        //creation lavabo robinneterie
        $lavaboRobinetterieSdb1=new Elements();
        $lavaboRobinetterieSdb1->setDescription($donnees['lavabo_sdb1']);
        $lavaboRobinetterieSdb1->setEtatEntree($donnees['etat_lavabo_entree']);
        $lavaboRobinetterieSdb1->setEtatSortie($donnees['etat_lavabo_sortie']);
        $lavaboRobinetterieSdb1->setTypeElement('lavabo et robinetterie');
        $lavaboRobinetterieSdb1->setidPiece($idSalleDeBain1);

        $idLavaboRobinetterieSdb1=$elementsDAO->Create($lavaboRobinetterieSdb1);

        //creation baignoire douche
        $baignoireDoucheSdb1=new Elements();
        $baignoireDoucheSdb1->setDescription($donnees['description_baignoireSdb1']);
        $baignoireDoucheSdb1->setEtatEntree($donnees['etat_baignoire_entree']);
        $baignoireDoucheSdb1->setEtatSortie($donnees['etat_baignoire_sortie']);
        $baignoireDoucheSdb1->setTypeElement('baignoire et douche');
        $baignoireDoucheSdb1->setidPiece($idSalleDeBain1);

        $idBaignoireDoucheSdb1=$elementsDAO->Create($baignoireDoucheSdb1);

        //creation wc 
        $wcSdb1=new Elements();
        $wcSdb1->setDescription($donnees['wc_sdb1']);
        $wcSdb1->setEtatEntree($donnees['etat_wc_entree']);
        $wcSdb1->setEtatSortie($donnees['etat_wc_sortie']);
        $wcSdb1->setTypeElement('wc');
        $wcSdb1->setidPiece($idSalleDeBain1);

        $idWcSdb1=$elementsDAO->Create($wcSdb1);

        #endregion

        #region Insertions dans la BDD (salle de bain 2)

        // création des prises de salle de bain
        $priseSdb2=new Prises();
        $priseSdb2->setDescription($donnees['prise_sdb2']);
        $priseSdb2->setEtatEntree($donnees['etat_prise_entree']);
        $priseSdb2->setEtatSortie($donnees['etat_prise_sortie']);
        $priseSdb2->setNombrePrises($donnees['nombre_prise_electrique']);
        $priseSdb2->setNombrePrises($donnees['nbPriseSdb2']);

        $idPriseSdb2=$prisesDAO->Create($priseSdb2);

        $salleDeBain2=new Piece();
        $salleDeBain2->setidTypePiece('Salle de bain');
        $salleDeBain2->setidLogement($idLogement);
        $salleDeBain2->setidPrise($idPriseSdb2);

        $idSalleDeBain2=$pieceDAO->Create($salleDeBain2);
        
        $murSdb2=new Elements();
        $murSdb2->setDescription($donnees['mur_sdb2']);
        $murSdb2->setEtatEntree($donnees['etat_mur_entree']);
        $murSdb2->setEtatSortie($donnees['etat_mur_sortie']);
        $murSdb2->setTypeElement('Mur');
        $murSdb2->setidPiece($idSalleDeBain2);

        $idMurSdb2=$elementsDAO->Create($murSdb2);
        

        $solSdb2=new Elements();
        $solSdb2->setDescription($donnees['sol_sdb2']);
        $solSdb2->setEtatEntree($donnees['etat_sol_entree']);
        $solSdb2->setEtatSortie($donnees['etat_sol_sortie']);
        $solSdb2->setTypeElement('sol');

        $idSolSdb2=$elementsDAO->Create($solSdb2);

        //création vitrages volets
        $vitrages_voletsSdb2=new Elements();
        $vitrages_voletsSdb2->setDescription($donnees['vitrage_sdb2']);
        $vitrages_voletsSdb2->setEtatEntree($donnees['etat_vitrage_entree']);
        $vitrages_voletsSdb2->setEtatSortie($donnees['etat_vitrage_sortie']);
        $vitrages_voletsSdb2->setTypeElement('Vitrages et Volets');
        $vitrages_voletsSdb2->setidPiece($idSalleDeBain2);

        $idVitrages_voletsSdb=$elementsDAO->Create($vitrages_voletsSdb2);

        //création plafond
        $plafondSdb2=new Elements();
        $plafondSdb2->setDescription($donnees['description_etat_plafond_sdb2']);
        $plafondSdb2->setEtatEntree($donnees['etat_plafond_sortie']);
        $plafondSdb2->setEtatSortie($donnees['etat_cuisine_plafond_sortie']);
        $plafondSdb2->setTypeElement('Plafond');
        $plafondSdb2->setidPiece($idSalleDeBain2);

        $idPlafondSdb2=$elementsDAO->Create($plafondSdb2);
        
        // creation eclairage et interrupteur
        $eclairageInterrupteurSdb2=new Elements();
        $eclairageInterrupteurSdb2->setDescription($donnees['eclairage_sdb2']);
        $eclairageInterrupteurSdb2->setEtatEntree($donnees['etat_eclairage_entree']);
        $eclairageInterrupteurSdb2->setEtatSortie($donnees['etat_eclairage_sortie']);
        $eclairageInterrupteurSdb2->setTypeElement('eclairage interrupteur');
        $eclairageInterrupteurSdb2->setidPiece($idSalleDeBain2);

        $idEclairageInterrupteurSdb2=$elementsDAO->Create($eclairageInterrupteurSdb2);

        //creation lavabo robinneterie
        $lavaboRobinetterieSdb2=new Elements();
        $lavaboRobinetterieSdb2->setDescription($donnees['lavabo_sdb2']);
        $lavaboRobinetterieSdb2->setEtatEntree($donnees['etat_lavabo_entree']);
        $lavaboRobinetterieSdb2->setEtatSortie($donnees['etat_lavabo_sortie']);
        $lavaboRobinetterieSdb2->setTypeElement('lavabo et robinetterie');
        $lavaboRobinetterieSdb2->setidPiece($idSalleDeBain2);

        $idLavaboRobinetterieSdb2=$elementsDAO->Create($lavaboRobinetterieSdb2);

        //creation baignoire douche
        $baignoireDoucheSdb2=new Elements();
        $baignoireDoucheSdb2->setDescription($donnees['description_baignoireSdb2']);
        $baignoireDoucheSdb2->setEtatEntree($donnees['etat_baignoire_entree']);
        $baignoireDoucheSdb2->setEtatSortie($donnees['etat_baignoire_sortie']);
        $baignoireDoucheSdb2->setTypeElement('baignoire et douche');
        $baignoireDoucheSdb2->setidPiece($idSalleDeBain2);

        $idBaignoireDoucheSdb2=$elementsDAO->Create($baignoireDoucheSdb2);

        //creation wc 
        $wcSdb2=new Elements();
        $wcSdb2->setDescription($donnees['wc_sdb2']);
        $wcSdb2->setEtatEntree($donnees['etat_wc_entree']);
        $wcSdb2->setEtatSortie($donnees['etat_wc_sortie']);
        $wcSdb2->setTypeElement('wc');
        $wcSdb2->setidPiece($idSalleDeBain2);

        $idWcSdb2=$elementsDAO->Create($wcSdb2);

        #endregion





    }
}





?>