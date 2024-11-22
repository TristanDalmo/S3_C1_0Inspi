<?php

namespace MediaMetier;

require_once(__DIR__ . "/I_GenerationWord.php");
use MediaMetier\I_GenerationWord;

require_once(__DIR__ . "/../bibliotheque/Psr4AutoloaderClass.php");
use Bibliotheque\Psr4AutoloaderClass;


/**
 * Classe permettant de générer un fichier word 
 */
class GenerationWord implements I_GenerationWord {


    public function GenererWord(array $donnees, string $cheminFichier) {

        // instantiate the loader
        $loader = new Psr4AutoloaderClass();
        // register the autoloader
        $loader->register();
        
        // register the base directories for the namespace prefix
        $loader->addNamespace('\PhpOffice\PHPWord', __DIR__ . '/../bibliotheque/PhpWord');


        // Copier coller du modèle de l'état des lieux
        copy("../../MediasClients/Etat-Des-Lieux(Modele).docx",$cheminFichier . "Etat-Des-Lieux.docx"); 

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($cheminFichier . "Etat-Des-Lieux.docx");
    
 
        $templateProcessor->setValue('Date d\'entrée', htmlspecialchars($_POST['fDate'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Date de sortie', htmlspecialchars($_POST['fDateS'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Permis', htmlspecialchars($_POST['fPermis'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Autre texte', htmlspecialchars($_POST['textautre'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Prénom locataire', htmlspecialchars($_POST['prenom_locataire'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Nom locataire', htmlspecialchars($_POST['nom_locataire'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Adresse locataire', htmlspecialchars($_POST['adresse_locataire'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Prénom bailleur', htmlspecialchars($_POST['prenom_bailleur'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Nom bailleur', htmlspecialchars($_POST['nom_bailleur'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Adresse bailleur', htmlspecialchars($_POST['adresse_bailleur'] ?? 'Non renseignée'));
        $templateProcessor->setValue('surface du bien', htmlspecialchars($_POST['SURFACE'] ?? 'Non renseignée'));
        $templateProcessor->setValue('nombre de piece', htmlspecialchars($_POST['nbpiece'] ?? 'Non renseignée'));
        
        // Cuisine
        $templateProcessor->setValue('Description du mur de la cuisine', htmlspecialchars($_POST['description_mur_cuisine'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État du mur de la cuisine (entrée)', htmlspecialchars($_POST['etat_cuisine_mur_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État du mur de la cuisine (sortie)', htmlspecialchars($_POST['etat_cuisine_mur_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description du sol de la cuisine', htmlspecialchars($_POST['description_sol_cuisine'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État du sol de la cuisine (entrée)', htmlspecialchars($_POST['etat_cuisine_sol_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État du sol de la cuisine (sortie)', htmlspecialchars($_POST['etat_cuisine_sol_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description des vitrages et volets de la cuisine', htmlspecialchars($_POST['description_vitrage_volets'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des vitrages et volets de la cuisine (entrée)', htmlspecialchars($_POST['etat_cuisine_vitrage_volets_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des vitrages et volets de la cuisine (sortie)', htmlspecialchars($_POST['etat_cuisine_vitrage_volets_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description du plafond de la cuisine', htmlspecialchars($_POST['description_plafond_cuisine'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État du plafond de la cuisine (entrée)', htmlspecialchars($_POST['etat_cuisine_plafond_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État du plafond de la cuisine (sortie)', htmlspecialchars($_POST['etat_cuisine_plafond_sortie'] ?? 'Non renseignée'));
 
        
 
        // Prises, placards, électroménagers
        $templateProcessor->setValue('Description des éclairages et interrupteurs', htmlspecialchars($_POST['description_eclairage_interrupteurs'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des éclairages et interrupteurs (entrée)', htmlspecialchars($_POST['etat_cuisine_eclairage_interrupteurs_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des éclairages et interrupteurs (sortie)', htmlspecialchars($_POST['etat_cuisine_eclairage_interrupteurs_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Nombre de prises électriques', htmlspecialchars($_POST['nombre_prise_electrique'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Description des prises électriques', htmlspecialchars($_POST['description_prise_electrique'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des prises électriques (entrée)', htmlspecialchars($_POST['etat_cuisine_prise_electrique_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des prises électriques (sortie)', htmlspecialchars($_POST['etat_cuisine_prise_electrique_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description des placards et tiroirs', htmlspecialchars($_POST['description_placards_tiroirs'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des placards et tiroirs (entrée)', htmlspecialchars($_POST['etat_cuisine_placards_tiroirs_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État des placards et tiroirs (sortie)', htmlspecialchars($_POST['etat_cuisine_placards_tiroirs_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description de l\'évier et robinetterie', htmlspecialchars($_POST['description_evier_robinetterie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de l\'évier et robinetterie (entrée)', htmlspecialchars($_POST['etat_cuisine_evier_robinetterie_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de l\'évier et robinetterie (sortie)', htmlspecialchars($_POST['etat_cuisine_evier_robinetterie_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description de la plaque de cuisson et four', htmlspecialchars($_POST['description_plaque_four'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la plaque de cuisson et du four (entrée)', htmlspecialchars($_POST['etat_cuisine_plaque_four_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la plaque de cuisson et du four (sortie)', htmlspecialchars($_POST['etat_cuisine_plaque_four_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Description de la hotte', htmlspecialchars($_POST['description_hotte'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la hotte (entrée)', htmlspecialchars($_POST['etat_cuisine_hotte_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la hotte (sortie)', htmlspecialchars($_POST['etat_cuisine_hotte_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Nom de l\'électroménager', htmlspecialchars($_POST['electromenager_nom'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Description de l\'électroménager', htmlspecialchars($_POST['description_electromenager'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de l\'électroménager (entrée)', htmlspecialchars($_POST['etat_cuisine_electromenager_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de l\'électroménager (sortie)', htmlspecialchars($_POST['etat_cuisine_electromenager_sortie'] ?? 'Non renseignée'));
 
        
        
 
        // Salle de bain
        $templateProcessor->setValue('Mur salle de bain 1', htmlspecialchars($_POST['mur_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Mur salle de bain 2', htmlspecialchars($_POST['mur_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur (entrée)', htmlspecialchars($_POST['etat_mur_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur (sortie)', htmlspecialchars($_POST['etat_mur_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol salle de bain 1', htmlspecialchars($_POST['sol_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol salle de bain 2', htmlspecialchars($_POST['sol_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol (entrée)', htmlspecialchars($_POST['etat_sol_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol (sortie)', htmlspecialchars($_POST['etat_sol_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage salle de bain 1', htmlspecialchars($_POST['vitrage_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage salle de bain 2', htmlspecialchars($_POST['vitrage_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du vitrage (entrée)', htmlspecialchars($_POST['etat_vitrage_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du vitrage (sortie)', htmlspecialchars($_POST['etat_vitrage_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('plafond de la salle de bain 1', htmlspecialchars($_POST['plafond_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('plafond de la salle de bain 2', htmlspecialchars($_POST['plafond_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (entrée)', htmlspecialchars($_POST['etat_plafond_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (sortie)', htmlspecialchars($_POST['etat_plafond_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Éclairage salle de bain 1', htmlspecialchars($_POST['eclairage_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Éclairage salle de bain 2', htmlspecialchars($_POST['eclairage_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (entrée)', htmlspecialchars($_POST['etat_eclairage_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (sortie)', htmlspecialchars($_POST['etat_eclairage_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Nombre de prises salle de bain1', htmlspecialchars($_POST['prise_sdb1'] ?? 'Non renseignée')); 
        $templateProcessor->setValue('Nombre de prises salle de bain 2', htmlspecialchars($_POST['prise_sdb2'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la prise (entrée)', htmlspecialchars($_POST['etat_prise_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la prise (sortie)', htmlspecialchars($_POST['etat_prise_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Lavabo salle de bain 1', htmlspecialchars($_POST['lavabo_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Lavabo salle de bain 2', htmlspecialchars($_POST['lavabo_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du lavabo (entrée)', htmlspecialchars($_POST['etat_lavabo_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du lavabo (sortie)', htmlspecialchars($_POST['etat_lavabo_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Baignoire salle de bain 1', htmlspecialchars($_POST['baignoire_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Baignoire salle de bain 2', htmlspecialchars($_POST['baignoire_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la baignoire (entrée)', htmlspecialchars($_POST['etat_baignoire_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la baignoire (sortie)', htmlspecialchars($_POST['etat_baignoire_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('WC salle de bain 1', htmlspecialchars($_POST['wc_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('WC salle de bain 2', htmlspecialchars($_POST['wc_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des WC (entrée)', htmlspecialchars($_POST['etat_wc_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des WC (sortie)', htmlspecialchars($_POST['etat_wc_sortie'] ?? 'Non renseigné'));
        
        
        // Chambre
        $templateProcessor->setValue('Mur chambre 1', htmlspecialchars($_POST['murChambre1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Mur chambre 2', htmlspecialchars($_POST['murChambre2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Mur chambre 3', htmlspecialchars($_POST['murChambre3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 1 (entrée)', htmlspecialchars($_POST['etatEntreeMur1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 2 (entrée)', htmlspecialchars($_POST['etatEntreeMur2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 3 (entrée)', htmlspecialchars($_POST['etatEntreeMur3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 1 (sortie)', htmlspecialchars($_POST['etatSortieMur1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 2 (sortie)', htmlspecialchars($_POST['etatSortieMur2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 3 (sortie)', htmlspecialchars($_POST['etatSortieMur3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol chambre 1', htmlspecialchars($_POST['solChambre1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol chambre 2', htmlspecialchars($_POST['solChambre2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol chambre 3', htmlspecialchars($_POST['solChambre3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol 1 (entrée)', htmlspecialchars($_POST['etatEntreeSol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol 2 (entrée)', htmlspecialchars($_POST['etatEntreeSol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol 3 (entrée)', htmlspecialchars($_POST['etatEntreeSol3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol 1 (sortie)', htmlspecialchars($_POST['etatSortieSol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol 2 (sortie)', htmlspecialchars($_POST['etatSortieSol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol 3 (sortie)', htmlspecialchars($_POST['etatSortieSol3'] ?? 'Non renseigné'));

        $templateProcessor->setValue('Vitrage et volets chambre 1', htmlspecialchars($_POST['vitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 2', htmlspecialchars($_POST['vitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 3', htmlspecialchars($_POST['vitrages3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 1 (entrée)', htmlspecialchars($_POST['etatEntreeVitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 2 (entrée)', htmlspecialchars($_POST['etatEntreeVitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 3 (entrée)', htmlspecialchars($_POST['etatEntreeVitrages3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 1 (sortie)', htmlspecialchars($_POST['etatSortieVitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 2 (sortie)', htmlspecialchars($_POST['etatSortieVitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 3 (sortie)', htmlspecialchars($_POST['etatSortieVitrages3'] ?? 'Non renseigné'));

        $templateProcessor->setValue('Vitrage et volets chambre 1', htmlspecialchars($_POST['vitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 2', htmlspecialchars($_POST['vitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 3', htmlspecialchars($_POST['vitrages3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 1 (entrée)', htmlspecialchars($_POST['etatEntreeVitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 2 (entrée)', htmlspecialchars($_POST['etatEntreeVitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 3 (entrée)', htmlspecialchars($_POST['etatEntreeVitrages3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 1 (sortie)', htmlspecialchars($_POST['etatSortieVitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 2 (sortie)', htmlspecialchars($_POST['etatSortieVitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des Vitrage et volets 3 (sortie)', htmlspecialchars($_POST['etatSortieVitrages3'] ?? 'Non renseigné'));




 
        
        // Cuisine - Sol
        $templateProcessor->setValue('État du sol de la cuisine (entrée) - chambre 1', htmlspecialchars($_POST['etat_cuisine_sol_entree1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol de la cuisine (entrée) - chambre 2', htmlspecialchars($_POST['etat_cuisine_sol_entree2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol de la cuisine (entrée) - chambre 3', htmlspecialchars($_POST['etat_cuisine_sol_entree3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol de la cuisine (sortie) - chambre 1', htmlspecialchars($_POST['etat_cuisine_sol_sortie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol de la cuisine (sortie) - chambre 2', htmlspecialchars($_POST['etat_cuisine_sol_sortie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol de la cuisine (sortie) - chambre 3', htmlspecialchars($_POST['etat_cuisine_sol_sortie3'] ?? 'Non renseigné'));
        
        // Cuisine - Vitrages
        $templateProcessor->setValue('Vitrages de la cuisine - chambre 1', htmlspecialchars($_POST['vitrages1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrages de la cuisine - chambre 2', htmlspecialchars($_POST['vitrages2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrages de la cuisine - chambre 3', htmlspecialchars($_POST['vitrages3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages (entrée) - chambre 1', htmlspecialchars($_POST['etat_cuisine_vitrages_entree1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages (entrée) - chambre 2', htmlspecialchars($_POST['etat_cuisine_vitrages_entree2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages (entrée) - chambre 3', htmlspecialchars($_POST['etat_cuisine_vitrages_entree3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages (sortie) - chambre 1', htmlspecialchars($_POST['etat_cuisine_vitrages_sortie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages (sortie) - chambre 2', htmlspecialchars($_POST['etat_cuisine_vitrages_sortie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages (sortie) - chambre 3', htmlspecialchars($_POST['etat_cuisine_vitrages_sortie3'] ?? 'Non renseigné'));
        
        // Cuisine - Plafond
        $templateProcessor->setValue('Plafond de la cuisine - chambre 1', htmlspecialchars($_POST['plafond1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Plafond de la cuisine - chambre 2', htmlspecialchars($_POST['plafond2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Plafond de la cuisine - chambre 3', htmlspecialchars($_POST['plafond3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (entrée) - chambre 1', htmlspecialchars($_POST['etat_cuisine_plafond_entree1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (entrée) - chambre 2', htmlspecialchars($_POST['etat_cuisine_plafond_entree2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (entrée) - chambre 3', htmlspecialchars($_POST['etat_cuisine_plafond_entree3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (sortie) - chambre 1', htmlspecialchars($_POST['etat_cuisine_plafond_sortie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (sortie) - chambre 2', htmlspecialchars($_POST['etat_cuisine_plafond_sortie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (sortie) - chambre 3', htmlspecialchars($_POST['etat_cuisine_plafond_sortie3'] ?? 'Non renseigné'));
        
        // Cuisine - Éclairage
        $templateProcessor->setValue('Éclairage de la cuisine - chambre 1', htmlspecialchars($_POST['eclairage1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Éclairage de la cuisine - chambre 2', htmlspecialchars($_POST['eclairage2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Éclairage de la cuisine - chambre 3', htmlspecialchars($_POST['eclairage3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (entrée) - chambre 1', htmlspecialchars($_POST['etat_chambre_eclairage_entree1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (entrée) - chambre 2', htmlspecialchars($_POST['etat_chambre_eclairage_entree2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (entrée) - chambre 3', htmlspecialchars($_POST['etat_chambre_eclairage_entree3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (sortie) - chambre 1', htmlspecialchars($_POST['etat_chambre_eclairage_sortie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (sortie) - chambre 2', htmlspecialchars($_POST['etat_chambre_eclairage_sortie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (sortie) - chambre 3', htmlspecialchars($_POST['etat_chambre_eclairage_sortie3'] ?? 'Non renseigné'));
        
        // Cuisine - Plafond Électrique
        $templateProcessor->setValue('Plafond électrique - chambre 1', htmlspecialchars($_POST['plafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Plafond électrique - chambre 2', htmlspecialchars($_POST['plafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Plafond électrique - chambre 3', htmlspecialchars($_POST['plafondElectrique3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond électrique (entrée) - chambre 1', htmlspecialchars($_POST['etatEntreePlafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond électrique (entrée) - chambre 2', htmlspecialchars($_POST['etatEntreePlafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond électrique (entrée) - chambre 3', htmlspecialchars($_POST['etatEntreePlafondElectrique3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond électrique (sortie) - chambre 1', htmlspecialchars($_POST['etatSortiePlafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond électrique (sortie) - chambre 2', htmlspecialchars($_POST['etatSortiePlafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond électrique (sortie) - chambre 3', htmlspecialchars($_POST['etatSortiePlafondElectrique3'] ?? 'Non renseigné'));
        
        $templateProcessor->setValue('Nombre de plafond électrique (sortie) - chambre 1', htmlspecialchars($_POST['nbPlafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Nombre de plafond électrique (sortie) - chambre 2', htmlspecialchars($_POST['nbPlafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Nombre de plafond électrique (sortie) - chambre 3', htmlspecialchars($_POST['nbPlafondElectrique3'] ?? 'Non renseigné'));
        
        
        
        
        // WC - Description et état des murs
        $templateProcessor->setValue('Description des murs WC - chambre 1', htmlspecialchars($_POST['description_mur_wc1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Description des murs WC - chambre 2', htmlspecialchars($_POST['description_mur_wc2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (entrée) - chambre 1', htmlspecialchars($_POST['etat_wc1_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (entrée) - chambre 2', htmlspecialchars($_POST['etat_wc2_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (sortie) - chambre 1', htmlspecialchars($_POST['etat_wc1_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (sortie) - chambre 2', htmlspecialchars($_POST['etat_wc2_sortie'] ?? 'Non renseigné'));
        
        // WC - Description et état des sols
        $templateProcessor->setValue('Description du sol WC - chambre 1', htmlspecialchars($_POST['description_sol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Description du sol WC - chambre 2', htmlspecialchars($_POST['description_sol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (entrée) - chambre 1', htmlspecialchars($_POST['etat_entree_sol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (entrée) - chambre 2', htmlspecialchars($_POST['etat_entree_sol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (sortie) - chambre 1', htmlspecialchars($_POST['etat_sortie_sol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (sortie) - chambre 2', htmlspecialchars($_POST['etat_sortie_sol2'] ?? 'Non renseigné'));
        
        // WC - Vitrages et volets
        $templateProcessor->setValue('Vitrages et volets WC - chambre 1', htmlspecialchars($_POST['vitrage_volet1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrages et volets WC - chambre 2', htmlspecialchars($_POST['vitrage_volet2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (entrée) - chambre 1', htmlspecialchars($_POST['etat_entree_vitrage_volet1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (entrée) - chambre 2', htmlspecialchars($_POST['etat_entree_vitrage_volet2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (sortie) - chambre 1', htmlspecialchars($_POST['etat_sortie_vitrage_volet1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (sortie) - chambre 2', htmlspecialchars($_POST['etat_sortie_vitrage_volet2'] ?? 'Non renseigné'));
        
        // WC - Tuyauterie
        $templateProcessor->setValue('Tuyauterie WC - chambre 1', htmlspecialchars($_POST['tuyauterie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Tuyauterie WC - chambre 2', htmlspecialchars($_POST['tuyauterie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (entrée) - chambre 1', htmlspecialchars($_POST['etat_entree_tuyauterie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (entrée) - chambre 2', htmlspecialchars($_POST['etat_entree_tuyauterie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (sortie) - chambre 1', htmlspecialchars($_POST['etat_sortie_tuyauterie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (sortie) - chambre 2', htmlspecialchars($_POST['etat_sortie_tuyauterie2'] ?? 'Non renseigné'));
        
        // WC - Luminaire 
        $templateProcessor->setValue('Luminaire WC - chambre 1', htmlspecialchars($_POST['luminaire1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Luminaire WC - chambre 2', htmlspecialchars($_POST['luminaire2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (entrée) - chambre 1', htmlspecialchars($_POST['etat_entree_luminaire1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (entrée) - chambre 2', htmlspecialchars($_POST['etat_entree_luminaire2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (sortie) - chambre 1', htmlspecialchars($_POST['etat_sortie_luminaire1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (sortie) - chambre 2', htmlspecialchars($_POST['etat_sortie_luminaire2'] ?? 'Non renseigné'));
        
        // Zone de commentaire
        $templateProcessor->setValue('Zone de commentaire', htmlspecialchars($_POST['zone_de_commentaire'] ?? 'Non renseignée'));
    } 
}  
               
?>   
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        





        // Ouverture du fichier avec le chemin donné



        // Écriture du fichier




    }


}

?>