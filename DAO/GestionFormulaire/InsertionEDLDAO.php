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

        #region Initialisation des DAO

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
        $cuisine->setidTypePiece(3);
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
        $priseSdb1->setNombrePrises($donnees['nombre_prise_electrique1']);

        $idPriseSdb1=$prisesDAO->Create($priseSdb1);

        $salleDeBain1=new Piece();
        $salleDeBain1->setidTypePiece(4);
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
        $priseSdb2->setNombrePrises($donnees['nombre_prise_electrique2']);

        $idPriseSdb2=$prisesDAO->Create($priseSdb2);

        $salleDeBain2=new Piece();
        $salleDeBain2->setidTypePiece(4);
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

        #region Insertion Chambre1

        $chambre1=new Piece();

        $chambre1->setidTypePiece(3);
        $chambre1->setidLogement($idLogement);

        $idChambre1=$pieceDAO->Create($chambre);

        // creation du mur 1
        $mur1Chambre=new Elements();
        $mur1Chambre->setDescription($donnees['murChambre1']);
        $mur1Chambre->setEtatEntree($donnees['etatEntreeMur1']);
        $mur1Chambre->setEtatSortie($donnees['etatSortieMur1']);
        $mur1Chambre->setTypeElement('mur');
        $mur1Chambre->setidPiece($idChambre1);

        // creation sol
        $sol1Chambre=new Elements();
        $sol1Chambre->setDescription($donnees['solChambre1']);
        $sol1Chambre->setEtatEntree($donnees['etat_cuisine_sol_entree1']);
        $sol1Chambre->setEtatSortie($donnees['etat_cuisine_sol_sortie1']);
        $sol1Chambre->setTypeElement('sol');
        $sol1Chambre->setidPiece($chambre1);

        $idSol1Chambre=$elementsDAO->Create($sol1Chambre);

        //création vitrages volets
        $vitrages_voletsChambre1=new Elements();
        $vitrages_voletsChambre1->setDescription($donnees['vitrages1']);
        $vitrages_voletsChambre1->setEtatEntree($donnees['etat_cuisine_vitrages_entree1']);
        $vitrages_voletsChambre1->setEtatSortie($donnees['etat_cuisine_vitrages_sortie1']);
        $vitrages_voletsChambre1->setTypeElement('Vitrages et Volets');
        $vitrages_voletsChambre1->setidPiece($idChambre1);

        $idVitrages_voletsChambre=$elementsDAO->Create($vitrages_voletsChambre1);

        //création plafond
        $plafond1Chambre=new Elements();
        $plafond1Chambre->setDescription($donnees['plafond1']);
        $plafond1Chambre->setEtatEntree($donnees['etat_cuisine_plafond_entree1']);
        $plafond1Chambre->setEtatSortie($donnees['etat_cuisine_plafond_sortie1']);
        $plafond1Chambre->setTypeElement('Plafond');
        $plafond1Chambre->setidPiece($idChambre1);

        $idPlafond1Chambre=$elementsDAO->Create($plafond1Chambre);

        // creation eclairage et interrupteur
        $eclairageInterrupteurChambre1=new Elements();
        $eclairageInterrupteurChambre1->setDescription($donnees['eclairage1']);
        $eclairageInterrupteurChambre1->setEtatEntree($donnees['etat_chambre_eclairage_entree1']);
        $eclairageInterrupteurChambre1->setEtatSortie($donnees['etat_chambre_eclairage_sortie1']);
        $eclairageInterrupteurChambre1->setTypeElement('eclairage interrupteur');
        $eclairageInterrupteurChambre1->setidPiece($idChambre1);

        $idEclairageInterrupteurChambre1=$elementsDAO->Create($eclairageInterrupteurChambre1);

        //création plafond electrique
        $plafondElectriqueChambre1=new Elements();
        $plafondElectriqueChambre1->setDescription($donnees['plafondElectrique1'].': '.$donnees['nbPlafondElectrique1']);
        $plafondElectriqueChambre1->setEtatEntree($donnees['etatEntreePlafondElectrique1']);
        $plafondElectriqueChambre1->setEtatSortie($donnees['etatSortiePlafondElectrique1']);
        $plafondElectriqueChambre1->setTypeElement('plafon electrique');
        $plafondElectriqueChambre1->setidPiece($idChambre1);

        $idplafondElectriqueChambre1->$elementsDAO->Create($plafondElectriqueChambre1);

        #endregion
    
        #region Insertion Chambre2

        $chambre2=new Piece();

        $chambre2->setidTypePiece(3);
        $chambre2->setidLogement($idLogement);

        $idChambre2=$pieceDAO->Create($chambre);

        // creation du mur 2
        $mur2Chambre=new Elements();
        $mur2Chambre->setDescription($donnees['murChambre2']);
        $mur2Chambre->setEtatEntree($donnees['etatEntreeMur2']);
        $mur2Chambre->setEtatSortie($donnees['etatSortieMur2']);
        $mur2Chambre->setTypeElement('mur');
        $mur2Chambre->setidPiece($idChambre2);

        // creation sol
        $sol2Chambre=new Elements();
        $sol2Chambre->setDescription($donnees['solChambre2']);
        $sol2Chambre->setEtatEntree($donnees['etat_cuisine_sol_entree2']);
        $sol2Chambre->setEtatSortie($donnees['etat_cuisine_sol_sortie2']);
        $sol2Chambre->setTypeElement('sol');
        $sol2Chambre->setidPiece($chambre2);

        $idSol2Chambre=$elementsDAO->Create($sol2Chambre);

        //création vitrages volets
        $vitrages_voletsChambre2=new Elements();
        $vitrages_voletsChambre2->setDescription($donnees['vitrages2']);
        $vitrages_voletsChambre2->setEtatEntree($donnees['etat_cuisine_vitrages_entree2']);
        $vitrages_voletsChambre2->setEtatSortie($donnees['etat_cuisine_vitrages_sortie2']);
        $vitrages_voletsChambre2->setTypeElement('Vitrages et Volets');
        $vitrages_voletsChambre2->setidPiece($idChambre2);

        $idVitrages_voletsChambre=$elementsDAO->Create($vitrages_voletsChambre2);

        //création plafond
        $plafond2Chambre=new Elements();
        $plafond2Chambre->setDescription($donnees['plafond2']);
        $plafond2Chambre->setEtatEntree($donnees['etat_cuisine_plafond_entree2']);
        $plafond2Chambre->setEtatSortie($donnees['etat_cuisine_plafond_sortie2']);
        $plafond2Chambre->setTypeElement('Plafond');
        $plafond2Chambre->setidPiece($idChambre2);

        $idPlafond2Chambre=$elementsDAO->Create($plafond2Chambre);

        // creation eclairage et interrupteur
        $eclairageInterrupteurChambre2=new Elements();
        $eclairageInterrupteurChambre2->setDescription($donnees['eclairage2']);
        $eclairageInterrupteurChambre2->setEtatEntree($donnees['etat_chambre_eclairage_entree2']);
        $eclairageInterrupteurChambre2->setEtatSortie($donnees['etat_chambre_eclairage_sortie2']);
        $eclairageInterrupteurChambre2->setTypeElement('eclairage interrupteur');
        $eclairageInterrupteurChambre2->setidPiece($idChambre2);

        $idEclairageInterrupteurChambre2=$elementsDAO->Create($eclairageInterrupteurChambre2);

        //création plafond electrique
        $plafondElectriqueChambre2=new Elements();
        $plafondElectriqueChambre2->setDescription($donnees['plafondElectrique2'].': '.$donnees['nbPlafondElectrique2']);
        $plafondElectriqueChambre2->setEtatEntree($donnees['etatEntreePlafondElectrique2']);
        $plafondElectriqueChambre2->setEtatSortie($donnees['etatSortiePlafondElectrique2']);
        $plafondElectriqueChambre2->setTypeElement('plafon electrique');
        $plafondElectriqueChambre2->setidPiece($idChambre2);

        $idplafondElectriqueChambre2->$elementsDAO->Create($plafondElectriqueChambre2);

        #endregion
        
        #region Insertion Chambre3

        $chambre3=new Piece();

        $chambre3->setidTypePiece(3);
        $chambre3->setidLogement($idLogement);

        $idChambre3=$pieceDAO->Create($chambre);

        // creation du mur 3
        $mur3Chambre=new Elements();
        $mur3Chambre->setDescription($donnees['murChambre3']);
        $mur3Chambre->setEtatEntree($donnees['etatEntreeMur3']);
        $mur3Chambre->setEtatSortie($donnees['etatSortieMur3']);
        $mur3Chambre->setTypeElement('mur');
        $mur3Chambre->setidPiece($idChambre3);

        // creation sol
        $sol3Chambre=new Elements();
        $sol3Chambre->setDescription($donnees['solChambre3']);
        $sol3Chambre->setEtatEntree($donnees['etat_cuisine_sol_entree3']);
        $sol3Chambre->setEtatSortie($donnees['etat_cuisine_sol_sortie3']);
        $sol3Chambre->setTypeElement('sol');
        $sol3Chambre->setidPiece($chambre3);

        $idSol3Chambre=$elementsDAO->Create($sol3Chambre);

        //création vitrages volets
        $vitrages_voletsChambre3=new Elements();
        $vitrages_voletsChambre3->setDescription($donnees['vitrages3']);
        $vitrages_voletsChambre3->setEtatEntree($donnees['etat_cuisine_vitrages_entree3']);
        $vitrages_voletsChambre3->setEtatSortie($donnees['etat_cuisine_vitrages_sortie3']);
        $vitrages_voletsChambre3->setTypeElement('Vitrages et Volets');
        $vitrages_voletsChambre3->setidPiece($idChambre3);

        $idVitrages_voletsChambre=$elementsDAO->Create($vitrages_voletsChambre3);

        //création plafond
        $plafond3Chambre=new Elements();
        $plafond3Chambre->setDescription($donnees['plafond3']);
        $plafond3Chambre->setEtatEntree($donnees['etat_cuisine_plafond_entree3']);
        $plafond3Chambre->setEtatSortie($donnees['etat_cuisine_plafond_sortie3']);
        $plafond3Chambre->setTypeElement('Plafond');
        $plafond3Chambre->setidPiece($idChambre3);

        $idPlafond3Chambre=$elementsDAO->Create($plafond3Chambre);

        // creation eclairage et interrupteur
        $eclairageInterrupteurChambre3=new Elements();
        $eclairageInterrupteurChambre3->setDescription($donnees['eclairage3']);
        $eclairageInterrupteurChambre3->setEtatEntree($donnees['etat_chambre_eclairage_entree3']);
        $eclairageInterrupteurChambre3->setEtatSortie($donnees['etat_chambre_eclairage_sortie3']);
        $eclairageInterrupteurChambre3->setTypeElement('eclairage interrupteur');
        $eclairageInterrupteurChambre3->setidPiece($idChambre3);

        $idEclairageInterrupteurChambre3=$elementsDAO->Create($eclairageInterrupteurChambre3);

        //création plafond electrique
        $plafondElectriqueChambre3=new Elements();
        $plafondElectriqueChambre3->setDescription($donnees['plafondElectrique3'].': '.$donnees['nbPlafondElectrique3']);
        $plafondElectriqueChambre3->setEtatEntree($donnees['etatEntreePlafondElectrique3']);
        $plafondElectriqueChambre3->setEtatSortie($donnees['etatSortiePlafondElectrique3']);
        $plafondElectriqueChambre3->setTypeElement('plafon electrique');
        $plafondElectriqueChambre3->setidPiece($idChambre3);

        $idplafondElectriqueChambre3->$elementsDAO->Create($plafondElectriqueChambre3);

        #endregion
    
        #region Insertion WC1

        $wc1=new Piece();

        $wc1->setidTypePiece(5);
        $wc1->setidLogement($idLogement);

        $idWc1=$pieceDAO->Create($wc1);

        // creation du mur 1
        $mur1Wc=new Elements();
        $mur1Wc->setDescription($donnees['description_mur_wc1']);
        $mur1Wc->setEtatEntree($donnees['etat_wc1_entree']);
        $mur1Wc->setEtatSortie($donnees['etat_wc1_sortie']);
        $mur1Wc->setTypeElement('mur');
        $mur1Wc->setidPiece($idWc1);

        $idMur1Wc=$elementsDAO->Create($mur1wc);

        // creation sol
        $sol1Wc=new Elements();
        $sol1Wc->setDescription($donnees['description_sol1']);
        $sol1Wc->setEtatEntree($donnees['etat_entree_sol1']);
        $sol1Wc->setEtatSortie($donnees['etat_cuisine_sol_sortie1']);
        $sol1Wc->setTypeElement('sol');
        $sol1Wc->setidPiece($wc1);

        $idSol1Wc=$elementsDAO->Create($sol1Wc);

        //création vitrages volets
        $vitrages_voletsWc1=new Elements();
        $vitrages_voletsWc1->setDescription($donnees['vitrage_volet1']);
        $vitrages_voletsWc1->setEtatEntree($donnees['etat_entree_vitrage_volet1']);
        $vitrages_voletsWc1->setEtatSortie($donnees['etat_sortie_vitrage_volet1']);
        $vitrages_voletsWc1->setTypeElement('Vitrages et Volets');
        $vitrages_voletsWc1->setidPiece($idwc1);

        $idVitrages_voletsWc1=$elementsDAO->Create($vitrages_voletsWc1);

        // tuyauterie
        $tuyauterieWc1=new Elements();
        $tuyauterieWc1->setDescription($donnees['tuyauterie1']);
        $tuyauterieWc1->setEtatEntree($donnees['etat_entree_tuyauterie1']);
        $tuyauterieWc1->setEtatSortie($donnees['etat_sortie_tuyauterie1']);
        $tuyauterieWc1->setTypeElement('luminaire');
        $tuyauterieWc1->setidPiece($idwc1);

        $idLuminaireWc1=$elementsDAO->Create($luminaireWc1);

        // luminaire
        $luminaireWc1=new Elements();
        $luminaireWc1->setDescription($donnees['luminaire1']);
        $luminaireWc1->setEtatEntree($donnees['etat_entree_luminaire1']);
        $luminaireWc1->setEtatSortie($donnees['etat_sortie_luminaire1']);
        $luminaireWc1->setTypeElement('luminaire');
        $luminaireWc1->setidPiece($idwc1);

        $idLuminaireWc1=$elementsDAO->Create($luminaireWc1);
   
        #endregion
    
        #region Insertion WC2

        $wc2=new Piece();

        $wc2->setidTypePiece(5);
        $wc2->setidLogement($idLogement);

        $idWc2=$pieceDAO->Create($wc2);

        // creation du mur 2
        $mur2Wc=new Elements();
        $mur2Wc->setDescription($donnees['description_mur_wc2']);
        $mur2Wc->setEtatEntree($donnees['etat_wc2_entree']);
        $mur2Wc->setEtatSortie($donnees['etat_wc2_sortie']);
        $mur2Wc->setTypeElement('mur');
        $mur2Wc->setidPiece($idWc2);

        $idMur2Wc=$elementsDAO->Create($mur2wc);

        // creation sol
        $sol2Wc=new Elements();
        $sol2Wc->setDescription($donnees['description_sol2']);
        $sol2Wc->setEtatEntree($donnees['etat_entree_sol2']);
        $sol2Wc->setEtatSortie($donnees['etat_cuisine_sol_sortie2']);
        $sol2Wc->setTypeElement('sol');
        $sol2Wc->setidPiece($wc2);

        $idSol2Wc=$elementsDAO->Create($sol2Wc);

        //création vitrages volets
        $vitrages_voletsWc2=new Elements();
        $vitrages_voletsWc2->setDescription($donnees['vitrage_volet2']);
        $vitrages_voletsWc2->setEtatEntree($donnees['etat_entree_vitrage_volet2']);
        $vitrages_voletsWc2->setEtatSortie($donnees['etat_sortie_vitrage_volet2']);
        $vitrages_voletsWc2->setTypeElement('Vitrages et Volets');
        $vitrages_voletsWc2->setidPiece($idwc2);

        $idVitrages_voletsWc2=$elementsDAO->Create($vitrages_voletsWc2);

        // tuyauterie
        $tuyauterieWc2=new Elements();
        $tuyauterieWc2->setDescription($donnees['tuyauterie2']);
        $tuyauterieWc2->setEtatEntree($donnees['etat_entree_tuyauterie2']);
        $tuyauterieWc2->setEtatSortie($donnees['etat_sortie_tuyauterie2']);
        $tuyauterieWc2->setTypeElement('luminaire');
        $tuyauterieWc2->setidPiece($idwc2);

        $idLuminaireWc2=$elementsDAO->Create($luminaireWc2);

        // luminaire
        $luminaireWc2=new Elements();
        $luminaireWc2->setDescription($donnees['luminaire2']);
        $luminaireWc2->setEtatEntree($donnees['etat_entree_luminaire2']);
        $luminaireWc2->setEtatSortie($donnees['etat_sortie_luminaire2']);
        $luminaireWc2->setTypeElement('luminaire');
        $luminaireWc2->setidPiece($idwc2);

        $idLuminaireWc2=$elementsDAO->Create($luminaireWc2);
   
        #endregion    
    
        #region Insertion WC3

        $wc3=new Piece();

        $wc3->setidTypePiece(5);
        $wc3->setidLogement($idLogement);

        $idWc3=$pieceDAO->Create($wc3);

        // creation du mur 3
        $mur3Wc=new Elements();
        $mur3Wc->setDescription($donnees['description_mur_wc3']);
        $mur3Wc->setEtatEntree($donnees['etat_wc3_entree']);
        $mur3Wc->setEtatSortie($donnees['etat_wc3_sortie']);
        $mur3Wc->setTypeElement('mur');
        $mur3Wc->setidPiece($idWc3);

        $idMur3Wc=$elementsDAO->Create($mur3wc);

        // creation sol
        $sol3Wc=new Elements();
        $sol3Wc->setDescription($donnees['description_sol3']);
        $sol3Wc->setEtatEntree($donnees['etat_entree_sol3']);
        $sol3Wc->setEtatSortie($donnees['etat_cuisine_sol_sortie3']);
        $sol3Wc->setTypeElement('sol');
        $sol3Wc->setidPiece($wc3);

        $idSol3Wc=$elementsDAO->Create($sol3Wc);

        //création vitrages volets
        $vitrages_voletsWc3=new Elements();
        $vitrages_voletsWc3->setDescription($donnees['vitrage_volet3']);
        $vitrages_voletsWc3->setEtatEntree($donnees['etat_entree_vitrage_volet3']);
        $vitrages_voletsWc3->setEtatSortie($donnees['etat_sortie_vitrage_volet3']);
        $vitrages_voletsWc3->setTypeElement('Vitrages et Volets');
        $vitrages_voletsWc3->setidPiece($idwc3);

        $idVitrages_voletsWc3=$elementsDAO->Create($vitrages_voletsWc3);

        // tuyauterie
        $tuyauterieWc3=new Elements();
        $tuyauterieWc3->setDescription($donnees['tuyauterie3']);
        $tuyauterieWc3->setEtatEntree($donnees['etat_entree_tuyauterie3']);
        $tuyauterieWc3->setEtatSortie($donnees['etat_sortie_tuyauterie3']);
        $tuyauterieWc3->setTypeElement('luminaire');
        $tuyauterieWc3->setidPiece($idwc3);

        $idLuminaireWc3=$elementsDAO->Create($luminaireWc3);

        // luminaire
        $luminaireWc3=new Elements();
        $luminaireWc3->setDescription($donnees['luminaire3']);
        $luminaireWc3->setEtatEntree($donnees['etat_entree_luminaire3']);
        $luminaireWc3->setEtatSortie($donnees['etat_sortie_luminaire3']);
        $luminaireWc3->setTypeElement('luminaire');
        $luminaireWc3->setidPiece($idwc3);

        $idLuminaireWc3=$elementsDAO->Create($luminaireWc3);
   
        #endregion  
    }
}





?>