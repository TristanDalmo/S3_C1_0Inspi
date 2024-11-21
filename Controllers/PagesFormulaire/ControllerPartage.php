<?php

namespace Controllers\PagesFormulaire;

require_once(__DIR__ . "/../../Views/PagesFormulaire/PagePartage.php");

use FPDF;
use Views\PagesFormulaire\PagePartage;

require_once(__DIR__ . "/../../../bibliotheque/fpdf186/fpdf.php");
/**
 * Classe permettant de créer la page de remplissage du formulaire
 */
class ControllerPartage {

    // Page à initialiser
    private PagePartage $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesFormulaire\PagePartage $page Page à utiliser
     */
    public function __construct(PagePartage $page) {
        $this->page = $page;
    }


    /**
     * Méthode permettant d'afficher le contenu de la page
     * @return string Page web à afficher
     */
    public function index() : string {

        /**
         * ========================================================================================================
         * =                                INSERER PARTIE SERVICE ICI                                            =
         * ========================================================================================================

         */         
        $this->generatePDF();

      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Affichage du message que le formulaire a été soumis
            echo "<h1>Détails du formulaire soumis</h1>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr><th>Nom du champ</th><th>Valeur</th></tr>";
            
            // Génération du PDF
            $this->generatePDF();
    
            // Interrompre le processus pour afficher le PDF directement (ne pas poursuivre l'affichage HTML)
            exit;  // Arrêter ici pour éviter l'affichage de la page HTML après le PDF
        }
    
        // Création de la page
        $controller = new ControllerPartage(new PagePartage());
        echo $controller->index();          

        return $this->page->GeneratePage();
    }
    
    public function generatePDF(){


     

        // Récupération des données du formulaire
        $fDate = htmlspecialchars($_POST['fDate'] ?? 'Non renseignée', ENT_QUOTES, 'UTF-8');
        $fDateS = htmlspecialchars($_POST['fDateS'] ?? 'Non renseignée', ENT_QUOTES, 'UTF-8');
        $fPermis = htmlspecialchars($_POST['fPermis'] ??'Non renseignée');
        $textautre = htmlspecialchars($_POST['textautre'] ?? 'Non renseignée');
        $prenomLocataire = htmlspecialchars($_POST['prenom_locataire'] ?? 'Non renseigné');
        $nomLocataire = htmlspecialchars($_POST['nom_locataire'] ?? 'Non renseigné');
        $adresseLocataire = htmlspecialchars($_POST['adresse_locataire'] ?? 'Non renseignée');

        // Cuisine
        $descriptionmurcuisine = htmlspecialchars($_POST['description_mur_cuisine'] ?? 'Non renseignée');
        $etatCuisineMurEntree = htmlspecialchars($_POST['etat_cuisine_mur_entree'] ?? 'Non renseignée');
        $etatCuisineMurSortie = htmlspecialchars($_POST['etat_cuisine_mur_sortie'] ?? 'Non renseignée');
        $descriptionSolCuisine = htmlspecialchars($_POST['description_sol_cuisine'] ?? 'Non renseignée');
        $etatCuisineSolEntree = htmlspecialchars($_POST['etat_cuisine_sol_entree'] ?? 'Non renseignée');
        $etatCuisineSolSortie = htmlspecialchars($_POST['etat_cuisine_sol_sortie'] ?? 'Non renseignée');
        $descriptionVitrageVolets = htmlspecialchars($_POST['description_vitrage_volets'] ?? 'Non renseignée');
        $etatCuisineVitrageVoletsEntree = htmlspecialchars($_POST['etat_cuisine_vitrage_volets_entree'] ?? 'Non renseignée');
        $etatCuisineVitrageVoletsSortie = htmlspecialchars($_POST['etat_cuisine_vitrage_volets_sortie'] ?? 'Non renseignée');
        $descriptionPlafondCuisine = htmlspecialchars($_POST['description_plafond_cuisine'] ?? 'Non renseignée');
        $etatCuisinePlafondEntree = htmlspecialchars($_POST['etat_cuisine_plafond_entree'] ?? 'Non renseignée');
        $etatCuisinePlafondSortie = htmlspecialchars($_POST['etat_cuisine_plafond_sortie'] ?? 'Non renseignée');

        // Prises, placards, électroménagers
        $descriptionEclairageInterrupteurs = htmlspecialchars($_POST['description_eclairage_interrupteurs'] ?? 'Non renseignée');
        $etatCuisineEclairageInterrupteursEntree = htmlspecialchars($_POST['etat_cuisine_eclairage_interrupteurs_entree'] ?? 'Non renseignée');
        $etatCuisineEclairageInterrupteursSortie = htmlspecialchars($_POST['etat_cuisine_eclairage_interrupteurs_sortie'] ?? 'Non renseignée');
        $nombrePriseElectrique = htmlspecialchars($_POST['nombre_prise_electrique'] ?? 'Non renseigné');
        $descriptionPriseElectrique = htmlspecialchars($_POST['description_prise_electrique'] ?? 'Non renseignée');
        $etatCuisinePriseElectriqueEntree = htmlspecialchars($_POST['etat_cuisine_prise_electrique_entree'] ?? 'Non renseignée');
        $etatCuisinePriseElectriqueSortie = htmlspecialchars($_POST['etat_cuisine_prise_electrique_sortie'] ?? 'Non renseignée');
        $descriptionPlacardsTiroirs = htmlspecialchars($_POST['description_placards_tiroirs'] ?? 'Non renseignée');
        $etatCuisinePlacardsTiroirsEntree = htmlspecialchars($_POST['etat_cuisine_placards_tiroirs_entree'] ?? 'Non renseignée');
        $etatCuisinePlacardsTiroirsSortie = htmlspecialchars($_POST['etat_cuisine_placards_tiroirs_sortie'] ?? 'Non renseignée');
        $descriptionEvierRobinetterie = htmlspecialchars($_POST['description_evier_robinetterie'] ?? 'Non renseignée');
        $etatCuisineEvierRobinetterieEntree = htmlspecialchars($_POST['etat_cuisine_evier_robinetterie_entree'] ?? 'Non renseignée');
        $etatCuisineEvierRobinetterieSortie = htmlspecialchars($_POST['etat_cuisine_evier_robinetterie_sortie'] ?? 'Non renseignée');
        $descriptionPlaqueFour = htmlspecialchars($_POST['description_plaque_four'] ?? 'Non renseignée');
        $etatCuisinePlaqueFourEntree = htmlspecialchars($_POST['etat_cuisine_plaque_four_entree'] ?? 'Non renseignée');
        $etatCuisinePlaqueFourSortie = htmlspecialchars($_POST['etat_cuisine_plaque_four_sortie'] ?? 'Non renseignée');
        $descriptionHotte = htmlspecialchars($_POST['description_hotte'] ?? 'Non renseignée');
        $etatCuisineHotteEntree = htmlspecialchars($_POST['etat_cuisine_hotte_entree'] ?? 'Non renseignée');
        $etatCuisineHotteSortie = htmlspecialchars($_POST['etat_cuisine_hotte_sortie'] ?? 'Non renseignée');
        $electromenagerNom = htmlspecialchars($_POST['electromenager_nom'] ?? 'Non renseigné');
        $descriptionElectromenager = htmlspecialchars($_POST['description_electromenager'] ?? 'Non renseignée');
        $etatCuisineElectromenagerEntree = htmlspecialchars($_POST['etat_cuisine_electromenager_entree'] ?? 'Non renseignée');
        $etatCuisineElectromenagerSortie = htmlspecialchars($_POST['etat_cuisine_electromenager_sortie'] ?? 'Non renseignée');

        // Salle de bain
        $murSdb1 = htmlspecialchars($_POST['mur_sdb1'] ?? 'Non renseigné');
        $murSdb2 = htmlspecialchars($_POST['mur_sdb2'] ?? 'Non renseigné');
        $etatMurEntree = htmlspecialchars($_POST['etat_mur_entree'] ?? 'Non renseigné');
        $etatMurSortie = htmlspecialchars($_POST['etat_mur_sortie'] ?? 'Non renseigné');
        $solSdb1 = htmlspecialchars($_POST['sol_sdb1'] ?? 'Non renseigné');
        $solSdb2 = htmlspecialchars($_POST['sol_sdb2'] ?? 'Non renseigné');
        $etatSolEntree = htmlspecialchars($_POST['etat_sol_entree'] ?? 'Non renseigné');
        $etatSolSortie = htmlspecialchars($_POST['etat_sol_sortie'] ?? 'Non renseigné');
        $vitrageSdb1 = htmlspecialchars($_POST['vitrage_sdb1'] ?? 'Non renseigné');
        $vitrageSdb2 = htmlspecialchars($_POST['vitrage_sdb2'] ?? 'Non renseigné');
        $etatVitrageEntree = htmlspecialchars($_POST['etat_vitrage_entree'] ?? 'Non renseigné');
        $etatVitrageSortie = htmlspecialchars($_POST['etat_vitrage_sortie'] ?? 'Non renseigné');
        $etatPlafondEntree = htmlspecialchars($_POST['etat_plafond_entree'] ?? 'Non renseigné');
        $etatPlafondSortie = htmlspecialchars($_POST['etat_plafond_sortie'] ?? 'Non renseigné');
        $eclairageSdb1 = htmlspecialchars($_POST['eclairage_sdb1'] ?? 'Non renseigné');
        $eclairageSdb2 = htmlspecialchars($_POST['eclairage_sdb2'] ?? 'Non renseigné');
        $etatEclairageEntree = htmlspecialchars($_POST['etat_eclairage_entree'] ?? 'Non renseigné');
        $etatEclairageSortie = htmlspecialchars($_POST['etat_eclairage_sortie'] ?? 'Non renseigné');
        $priseSdb1 = htmlspecialchars($_POST['prise_sdb1'] ?? 'Non renseignée');
        $priseSdb2 = htmlspecialchars($_POST['prise_sdb2'] ?? 'Non renseignée');
        $etatPriseEntree = htmlspecialchars($_POST['etat_prise_entree'] ?? 'Non renseignée');
        $etatPriseSortie = htmlspecialchars($_POST['etat_prise_sortie'] ?? 'Non renseignée');
        $laveLingeSdb1 = htmlspecialchars($_POST['lavabo_sdb1'] ?? 'Non renseigné');
        $laveLingeSdb2 = htmlspecialchars($_POST['lavabo_sdb2'] ?? 'Non renseigné');
        $etatLavaboEntree = htmlspecialchars($_POST['etat_lavabo_entree'] ?? 'Non renseigné');
        $etatLavaboSortie = htmlspecialchars($_POST['etat_lavabo_sortie'] ?? 'Non renseigné');

        // WC
        $etatBaignoireEntree = htmlspecialchars($_POST['etat_baignoire_entree'] ?? 'Non renseigné');
        $etatBaignoireSortie = htmlspecialchars($_POST['etat_baignoire_sortie'] ?? 'Non renseigné');
        $wcSdb1 = htmlspecialchars($_POST['wc_sdb1'] ?? 'Non renseigné');
        $wcSdb2 = htmlspecialchars($_POST['wc_sdb2'] ?? 'Non renseigné');
        $etatWCEntree = htmlspecialchars($_POST['etat_wc_entree'] ?? 'Non renseigné');
        $etatWCSortie = htmlspecialchars($_POST['etat_wc_sortie'] ?? 'Non renseigné');

        // Chambre
        $murChambre1 = htmlspecialchars($_POST['murChambre1'] ?? 'Non renseigné');
        $murChambre2 = htmlspecialchars($_POST['murChambre2'] ?? 'Non renseigné');
        $murChambre3 = htmlspecialchars($_POST['murChambre3'] ?? 'Non renseigné');
        $etatEntreeMur1 = htmlspecialchars($_POST['etatEntreeMur1'] ?? 'Non renseigné');
        $etatEntreeMur2 = htmlspecialchars($_POST['etatEntreeMur2'] ?? 'Non renseigné');
        $etatEntreeMur3 = htmlspecialchars($_POST['etatEntreeMur3'] ?? 'Non renseigné');
        $etatSortieMur1 = htmlspecialchars($_POST['etatSortieMur1'] ?? 'Non renseigné');
        $etatSortieMur2 = htmlspecialchars($_POST['etatSortieMur2'] ?? 'Non renseigné');
        $etatSortieMur3 = htmlspecialchars($_POST['etatSortieMur3'] ?? 'Non renseigné');
        $solChambre1 = htmlspecialchars($_POST['solChambre1'] ?? 'Non renseigné');
        $solChambre2 = htmlspecialchars($_POST['solChambre2'] ?? 'Non renseigné');
        $solChambre3 = htmlspecialchars($_POST['solChambre3'] ?? 'Non renseigné');

        // Cuisine, vitres, plafonds, et éclairages supplémentaires
        $etatCuisineSolEntree1 = htmlspecialchars($_POST['etat_cuisine_sol_entree1'] ?? 'Non renseigné');
        $etatCuisineSolEntree2 = htmlspecialchars($_POST['etat_cuisine_sol_entree2'] ?? 'Non renseigné');
        $etatCuisineSolEntree3 = htmlspecialchars($_POST['etat_cuisine_sol_entree3'] ?? 'Non renseigné');
        $etatCuisineSolSortie1 = htmlspecialchars($_POST['etat_cuisine_sol_sortie1'] ?? 'Non renseigné');
        $etatCuisineSolSortie2 = htmlspecialchars($_POST['etat_cuisine_sol_sortie2'] ?? 'Non renseigné');
        $etatCuisineSolSortie3 = htmlspecialchars($_POST['etat_cuisine_sol_sortie3'] ?? 'Non renseigné');
        $vitrages1 = htmlspecialchars($_POST['vitrages1'] ?? 'Non renseigné');
        $vitrages2 = htmlspecialchars($_POST['vitrages2'] ?? 'Non renseigné');
        $vitrages3 = htmlspecialchars($_POST['vitrages3'] ?? 'Non renseigné');
        $etatCuisineVitragesEntree1 = htmlspecialchars($_POST['etat_cuisine_vitrages_entree1'] ?? 'Non renseigné');
        $etatCuisineVitragesEntree2 = htmlspecialchars($_POST['etat_cuisine_vitrages_entree2'] ?? 'Non renseigné');
        $etatCuisineVitragesEntree3 = htmlspecialchars($_POST['etat_cuisine_vitrages_entree3'] ?? 'Non renseigné');
        $etatCuisineVitragesSortie1 = htmlspecialchars($_POST['etat_cuisine_vitrages_sortie1'] ?? 'Non renseigné');
        $etatCuisineVitragesSortie2 = htmlspecialchars($_POST['etat_cuisine_vitrages_sortie2'] ?? 'Non renseigné');
        $etatCuisineVitragesSortie3 = htmlspecialchars($_POST['etat_cuisine_vitrages_sortie3'] ?? 'Non renseigné');
        $plafond1 = htmlspecialchars($_POST['plafond1'] ?? 'Non renseigné');
        $plafond2 = htmlspecialchars($_POST['plafond2'] ?? 'Non renseigné');
        $plafond3 = htmlspecialchars($_POST['plafond3'] ?? 'Non renseigné');
        $etatCuisinePlafondEntree1 = htmlspecialchars($_POST['etat_cuisine_plafond_entree1'] ?? 'Non renseigné');
        $etatCuisinePlafondEntree2 = htmlspecialchars($_POST['etat_cuisine_plafond_entree2'] ?? 'Non renseigné');
        $etatCuisinePlafondEntree3 = htmlspecialchars($_POST['etat_cuisine_plafond_entree3'] ?? 'Non renseigné');
        $etatCuisinePlafondSortie1 = htmlspecialchars($_POST['etat_cuisine_plafond_sortie1'] ?? 'Non renseigné');
        $etatCuisinePlafondSortie2 = htmlspecialchars($_POST['etat_cuisine_plafond_sortie2'] ?? 'Non renseigné');
        $etatCuisinePlafondSortie3 = htmlspecialchars($_POST['etat_cuisine_plafond_sortie3'] ?? 'Non renseigné');
        $eclairage1 = htmlspecialchars($_POST['eclairage1'] ?? 'Non renseigné');
        $eclairage2 = htmlspecialchars($_POST['eclairage2'] ?? 'Non renseigné');
        $eclairage3 = htmlspecialchars($_POST['eclairage3'] ?? 'Non renseigné');
        $etatChambreEclairageEntree1 = htmlspecialchars($_POST['etat_chambre_eclairage_entree1'] ?? 'Non renseigné');
        $etatChambreEclairageEntree2 = htmlspecialchars($_POST['etat_chambre_eclairage_entree2'] ?? 'Non renseigné');
        $etatChambreEclairageEntree3 = htmlspecialchars($_POST['etat_chambre_eclairage_entree3'] ?? 'Non renseigné');
        $etatChambreEclairageSortie1 = htmlspecialchars($_POST['etat_chambre_eclairage_sortie1'] ?? 'Non renseigné');
        $etatChambreEclairageSortie2 = htmlspecialchars($_POST['etat_chambre_eclairage_sortie2'] ?? 'Non renseigné');
        $etatChambreEclairageSortie3 = htmlspecialchars($_POST['etat_chambre_eclairage_sortie3'] ?? 'Non renseigné');
        $nbPlafondElectrique1 = htmlspecialchars($_POST['nbPlafondElectrique1'] ?? 'Non renseigné');
        $plafondElectrique1 = htmlspecialchars($_POST['plafondElectrique1'] ?? 'Non renseigné');
        $nbPlafondElectrique2 = htmlspecialchars($_POST['nbPlafondElectrique2'] ?? 'Non renseigné');
        $plafondElectrique2 = htmlspecialchars($_POST['plafondElectrique2'] ?? 'Non renseigné');
        $nbPlafondElectrique3 = htmlspecialchars($_POST['nbPlafondElectrique3'] ?? 'Non renseigné');
        $plafondElectrique3 = htmlspecialchars($_POST['plafondElectrique3'] ?? 'Non renseigné');
        $etatEntreePlafondElectrique1 = htmlspecialchars($_POST['etatEntreePlafondElectrique1'] ?? 'Non renseigné');
        $etatEntreePlafondElectrique2 = htmlspecialchars($_POST['etatEntreePlafondElectrique2'] ?? 'Non renseigné');
        $etatEntreePlafondElectrique3 = htmlspecialchars($_POST['etatEntreePlafondElectrique3'] ?? 'Non renseigné');
        $etatSortiePlafondElectrique1 = htmlspecialchars($_POST['etatSortiePlafondElectrique1'] ?? 'Non renseigné');
        $etatSortiePlafondElectrique2 = htmlspecialchars($_POST['etatSortiePlafondElectrique2'] ?? 'Non renseigné');
        $etatSortiePlafondElectrique3 = htmlspecialchars($_POST['etatSortiePlafondElectrique3'] ?? 'Non renseigné');

        // WC - description et état
        $descriptionMurWC1 = htmlspecialchars($_POST['description_mur_wc1'] ?? 'Non renseigné');
        $descriptionMurWC2 = htmlspecialchars($_POST['description_mur_wc2'] ?? 'Non renseigné');
        $etatWC1Entree = htmlspecialchars($_POST['etat_wc1_entree'] ?? 'Non renseigné');
        $etatWC2Entree = htmlspecialchars($_POST['etat_wc2_entree'] ?? 'Non renseigné');
        $etatWC1Sortie = htmlspecialchars($_POST['etat_wc1_sortie'] ?? 'Non renseigné');
        $etatWC2Sortie = htmlspecialchars($_POST['etat_wc2_sortie'] ?? 'Non renseigné');

        // Sols WC
        $descriptionSol1 = htmlspecialchars($_POST['description_sol1'] ?? 'Non renseigné');
        $descriptionSol2 = htmlspecialchars($_POST['description_sol2'] ?? 'Non renseigné');
        $etatEntreeSol1 = htmlspecialchars($_POST['etat_entree_sol1'] ?? 'Non renseigné');
        $etatEntreeSol2 = htmlspecialchars($_POST['etat_entree_sol2'] ?? 'Non renseigné');
        $etatSortieSol1 = htmlspecialchars($_POST['etat_sortie_sol1'] ?? 'Non renseigné');
        $etatSortieSol2 = htmlspecialchars($_POST['etat_sortie_sol2'] ?? 'Non renseigné');

        // Vitrages et volets WC
        $vitrageVolet1 = htmlspecialchars($_POST['vitrage_volet1'] ?? 'Non renseigné');
        $vitrageVolet2 = htmlspecialchars($_POST['vitrage_volet2'] ?? 'Non renseigné');
        $etatEntreeVitrageVolet1 = htmlspecialchars($_POST['etat_entree_vitrage_volet1'] ?? 'Non renseigné');
        $etatEntreeVitrageVolet2 = htmlspecialchars($_POST['etat_entree_vitrage_volet2'] ?? 'Non renseigné');
        $etatSortieVitrageVolet1 = htmlspecialchars($_POST['etat_sortie_vitrage_volet1'] ?? 'Non renseigné');
        $etatSortieVitrageVolet2 = htmlspecialchars($_POST['etat_sortie_vitrage_volet2'] ?? 'Non renseigné');

        // Tuyauterie
        $tuyauterie1 = htmlspecialchars($_POST['tuyauterie1'] ?? 'Non renseigné');
        $tuyauterie2 = htmlspecialchars($_POST['tuyauterie2'] ?? 'Non renseigné');
        $etatEntreeTuyauterie1 = htmlspecialchars($_POST['etat_entree_tuyauterie1'] ?? 'Non renseigné');
        $etatEntreeTuyauterie2 = htmlspecialchars($_POST['etat_entree_tuyauterie2'] ?? 'Non renseigné');
        $etatSortieTuyauterie1 = htmlspecialchars($_POST['etat_sortie_tuyauterie1'] ?? 'Non renseigné');
        $etatSortieTuyauterie2 = htmlspecialchars($_POST['etat_sortie_tuyauterie2'] ?? 'Non renseigné');

        // Luminaire
        $luminaire1 = htmlspecialchars($_POST['luminaire1'] ?? 'Non renseigné');
        $luminaire2 = htmlspecialchars($_POST['luminaire2'] ?? 'Non renseigné');
        $etatEntreeLuminaire1 = htmlspecialchars($_POST['etat_entree_luminaire1'] ?? 'Non renseigné');
        $etatEntreeLuminaire2 = htmlspecialchars($_POST['etat_entree_luminaire2'] ?? 'Non renseigné');
        $etatSortieLuminaire1 = htmlspecialchars($_POST['etat_sortie_luminaire1'] ?? 'Non renseigné');
        $etatSortieLuminaire2 = htmlspecialchars($_POST['etat_sortie_luminaire2'] ?? 'Non renseigné');

        // Zone de commentaire
        $zoneDeCommentaire = htmlspecialchars($_POST['zone_de_commentaire'] ?? 'Non renseignée');

        // Format du fichier (PDF ou autre)
        $fileFormat = htmlspecialchars($_POST['file_format'] ?? 'pdf');

        // Créer un nouvel objet PDF
        $pdf = new FPDF();

        $pdf->AddFont('Helvetica', '', 'Helvetica.php');

        $pdf->AddPage();
        $pdf->SetFont('Helvetica','',12 );

       
        // Titre principal
        $pdf->Cell(0, 10, utf8_decode( 'État des Lieux'), 0, 1, 'C');
        $pdf->Cell(0, 10, utf8_decode( '(Conforme LOI ALUR)'), 0, 1, 'C');

        // Récupération des données du formulaire 
        $pdf->Cell(0, 10, utf8_decode( 'Date d\'entrée : ' ). utf8_decode(  $fDate), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Date de sortie : ' ). utf8_decode( $fDateS), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Permis : ' ). utf8_decode( $fPermis), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Autre texte : ' ). utf8_decode( $textautre), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Prénom locataire : ' ). utf8_decode( $prenomLocataire), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Nom locataire : ' ). utf8_decode( $nomLocataire), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Adresse locataire : ' ). utf8_decode( $adresseLocataire), 0, 1, 'l');

        //cuisine 
        $pdf->Cell(0, 10, utf8_decode( 'Description du mur de la cuisine : ' ). utf8_decode( $descriptionmurcuisine), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur de la cuisine (entrée) : ' ). utf8_decode( $etatCuisineMurEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur de la cuisine (sortie) : ' ). utf8_decode( $etatCuisineMurSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description du sol de la cuisine : ' ). utf8_decode( $descriptionSolCuisine), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (entrée) : ' ). utf8_decode( $etatCuisineSolEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (sortie) : ' ). utf8_decode( $etatCuisineSolSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description des vitrages et volets de la cuisine : ' ). utf8_decode( $descriptionVitrageVolets), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages et volets de la cuisine (entrée) : ' ). utf8_decode( $etatCuisineVitrageVoletsEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages et volets de la cuisine (sortie) : ' ). utf8_decode( $etatCuisineVitrageVoletsSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description du plafond de la cuisine : ' ). utf8_decode( $descriptionPlafondCuisine), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond de la cuisine (entrée) : ' ). utf8_decode( $etatCuisinePlafondEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond de la cuisine (sortie) : ' ). utf8_decode( $etatCuisinePlafondSortie), 0, 1, 'l');

        // Prises, placards, électroménagers
        $pdf->Cell(0, 10, utf8_decode( 'Description des éclairages et interrupteurs : ' ). utf8_decode( $descriptionEclairageInterrupteurs), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des éclairages et interrupteurs (entrée) : ' ). utf8_decode( $etatCuisineEclairageInterrupteursEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des éclairages et interrupteurs (sortie) : ' ). utf8_decode( $etatCuisineEclairageInterrupteursSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Nombre de prises électriques : ' ). utf8_decode( $nombrePriseElectrique), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description des prises électriques : ' ). utf8_decode( $descriptionPriseElectrique), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des prises électriques (entrée) : ' ). utf8_decode( $etatCuisinePriseElectriqueEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des prises électriques (sortie) : ' ). utf8_decode( $etatCuisinePriseElectriqueSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description des placards et tiroirs : ' ). utf8_decode( $descriptionPlacardsTiroirs), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des placards et tiroirs (entrée) : ' ). utf8_decode( $etatCuisinePlacardsTiroirsEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des placards et tiroirs (sortie) : ' ). utf8_decode( $etatCuisinePlacardsTiroirsSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description de l\'évier et robinetterie : ' ). utf8_decode( $descriptionEvierRobinetterie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'évier et robinetterie (entrée) : ' ). utf8_decode( $etatCuisineEvierRobinetterieEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'évier et robinetterie (sortie) : ' ). utf8_decode( $etatCuisineEvierRobinetterieSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description de la plaque de cuisson et four : ' ). utf8_decode( $descriptionPlaqueFour), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la plaque de cuisson et du four (entrée) : ' ). utf8_decode( $etatCuisinePlaqueFourEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la plaque de cuisson et du four (sortie) : ' ). utf8_decode( $etatCuisinePlaqueFourSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description de la hotte : ' ). utf8_decode( $descriptionHotte), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la hotte (entrée) : ' ). utf8_decode( $etatCuisineHotteEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la hotte (sortie) : ' ). utf8_decode( $etatCuisineHotteSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Nom de l\'électroménager : ' ). utf8_decode( $electromenagerNom), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description de l\'électroménager : ' ). utf8_decode( $descriptionElectromenager), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'électroménager (entrée) : ' ). utf8_decode( $etatCuisineElectromenagerEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'électroménager (sortie) : ' ). utf8_decode( $etatCuisineElectromenagerSortie), 0, 1, 'l');

        // Salle de bain
        $pdf->Cell(0, 10, utf8_decode( 'Mur salle de bain 1 : ' ). utf8_decode( $murSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Mur salle de bain 2 : ' ). utf8_decode( $murSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur (entrée) : ' ). utf8_decode( $etatMurEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur (sortie) : ' ). utf8_decode( $etatMurSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Sol salle de bain 1 : ' ). utf8_decode( $solSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Sol salle de bain 2 : ' ). utf8_decode( $solSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol (entrée) : ' ). utf8_decode( $etatSolEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol (sortie) : ' ). utf8_decode( $etatSolSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Vitrage salle de bain 1 : ' ). utf8_decode( $vitrageSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Vitrage salle de bain 2 : ' ). utf8_decode( $vitrageSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du vitrage (entrée) : ' ). utf8_decode( $etatVitrageEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du vitrage (sortie) : ' ). utf8_decode( $etatVitrageSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (entrée) : ' ). utf8_decode( $etatPlafondEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (sortie) : ' ). utf8_decode( $etatPlafondSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Éclairage salle de bain 1 : ' ). utf8_decode( $eclairageSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Éclairage salle de bain 2 : ' ). utf8_decode( $eclairageSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (entrée) : ' ). utf8_decode( $etatEclairageEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (sortie) : ' ). utf8_decode( $etatEclairageSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Prise salle de bain 1 : ' ). utf8_decode( $priseSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Prise salle de bain 2 : ' ). utf8_decode( $priseSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la prise (entrée) : ' ). utf8_decode( $etatPriseEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la prise (sortie) : ' ). utf8_decode( $etatPriseSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Lavabo salle de bain 1 : ' ). utf8_decode( $laveLingeSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Lavabo salle de bain 2 : ' ). utf8_decode( $laveLingeSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du lavabo (entrée) : ' ). utf8_decode( $etatLavaboEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du lavabo (sortie) : ' ). utf8_decode( $etatLavaboSortie), 0, 1, 'l');

        // WC
        $pdf->Cell(0, 10, utf8_decode( 'État de la baignoire (entrée) : ' ). utf8_decode( $etatBaignoireEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la baignoire (sortie) : ' ). utf8_decode( $etatBaignoireSortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'WC salle de bain 1 : ' ). utf8_decode( $wcSdb1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'WC salle de bain 2 : ' ). utf8_decode( $wcSdb2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des WC (entrée) : ' ). utf8_decode( $etatWCEntree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des WC (sortie) : ' ). utf8_decode( $etatWCSortie), 0, 1, 'l');

        // Chambre
        $pdf->Cell(0, 10, utf8_decode( 'Mur chambre 1 : ' ). utf8_decode( $murChambre1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Mur chambre 2 : ' ). utf8_decode( $murChambre2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Mur chambre 3 : ' ). utf8_decode( $murChambre3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur 1 (entrée) : ' ). utf8_decode( $etatEntreeMur1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur 2 (entrée) : ' ). utf8_decode( $etatEntreeMur2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur 3 (entrée) : ' ). utf8_decode( $etatEntreeMur3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur 1 (sortie) : ' ). utf8_decode( $etatSortieMur1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur 2 (sortie) : ' ). utf8_decode( $etatSortieMur2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du mur 3 (sortie) : ' ). utf8_decode( $etatSortieMur3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Sol chambre 1 : ' ). utf8_decode( $solChambre1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Sol chambre 2 : ' ). utf8_decode( $solChambre2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Sol chambre 3 : ' ). utf8_decode( $solChambre3), 0, 1, 'l');

        

        // Cuisine - Sol
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (entrée) - chambre 1 : ' ). utf8_decode( $etatCuisineSolEntree1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (entrée) - chambre 2 : ' ). utf8_decode( $etatCuisineSolEntree2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (entrée) - chambre 3 : ' ). utf8_decode( $etatCuisineSolEntree3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (sortie) - chambre 1 : ' ). utf8_decode( $etatCuisineSolSortie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (sortie) - chambre 2 : ' ). utf8_decode( $etatCuisineSolSortie2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol de la cuisine (sortie) - chambre 3 : ' ). utf8_decode( $etatCuisineSolSortie3), 0, 1, 'l');

        // Cuisine - Vitrages
        $pdf->Cell(0, 10, utf8_decode( 'Vitrages de la cuisine - chambre 1 : ' ). utf8_decode( $vitrages1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Vitrages de la cuisine - chambre 2 : ' ). utf8_decode( $vitrages2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Vitrages de la cuisine - chambre 3 : ' ). utf8_decode( $vitrages3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages (entrée) - chambre 1 : ' ). utf8_decode( $etatCuisineVitragesEntree1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages (entrée) - chambre 2 : ' ). utf8_decode( $etatCuisineVitragesEntree2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages (entrée) - chambre 3 : ' ). utf8_decode( $etatCuisineVitragesEntree3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages (sortie) - chambre 1 : ' ). utf8_decode( $etatCuisineVitragesSortie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages (sortie) - chambre 2 : ' ). utf8_decode( $etatCuisineVitragesSortie2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages (sortie) - chambre 3 : ' ). utf8_decode( $etatCuisineVitragesSortie3), 0, 1, 'l');

        // Cuisine - Plafond
        $pdf->Cell(0, 10, utf8_decode( 'Plafond de la cuisine - chambre 1 : ' ). utf8_decode( $plafond1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Plafond de la cuisine - chambre 2 : ' ). utf8_decode( $plafond2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Plafond de la cuisine - chambre 3 : ' ). utf8_decode( $plafond3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (entrée) - chambre 1 : ' ). utf8_decode( $etatCuisinePlafondEntree1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (entrée) - chambre 2 : ' ). utf8_decode( $etatCuisinePlafondEntree2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (entrée) - chambre 3 : ' ). utf8_decode( $etatCuisinePlafondEntree3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (sortie) - chambre 1 : ' ). utf8_decode( $etatCuisinePlafondSortie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (sortie) - chambre 2 : ' ). utf8_decode( $etatCuisinePlafondSortie2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond (sortie) - chambre 3 : ' ). utf8_decode( $etatCuisinePlafondSortie3), 0, 1, 'l');

        // Cuisine - Éclairage
        $pdf->Cell(0, 10, utf8_decode( 'Éclairage de la cuisine - chambre 1 : ' ). utf8_decode( $eclairage1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Éclairage de la cuisine - chambre 2 : ' ). utf8_decode( $eclairage2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Éclairage de la cuisine - chambre 3 : ' ). utf8_decode( $eclairage3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (entrée) - chambre 1 : ' ). utf8_decode( $etatChambreEclairageEntree1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (entrée) - chambre 2 : ' ). utf8_decode( $etatChambreEclairageEntree2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (entrée) - chambre 3 : ' ). utf8_decode( $etatChambreEclairageEntree3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (sortie) - chambre 1 : ' ). utf8_decode( $etatChambreEclairageSortie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (sortie) - chambre 2 : ' ). utf8_decode( $etatChambreEclairageSortie2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de l\'éclairage (sortie) - chambre 3 : ' ). utf8_decode( $etatChambreEclairageSortie3), 0, 1, 'l');

        // Cuisine - Plafond Électrique
        $pdf->Cell(0, 10, utf8_decode( 'Plafond électrique - chambre 1 : ' ). utf8_decode( $plafondElectrique1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Plafond électrique - chambre 2 : ' ). utf8_decode( $plafondElectrique2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Plafond électrique - chambre 3 : ' ). utf8_decode( $plafondElectrique3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond électrique (entrée) - chambre 1 : ' ). utf8_decode( $etatEntreePlafondElectrique1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond électrique (entrée) - chambre 2 : ' ). utf8_decode( $etatEntreePlafondElectrique2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond électrique (entrée) - chambre 3 : ' ). utf8_decode( $etatEntreePlafondElectrique3), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond électrique (sortie) - chambre 1 : ' ). utf8_decode( $etatSortiePlafondElectrique1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond électrique (sortie) - chambre 2 : ' ). utf8_decode( $etatSortiePlafondElectrique2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du plafond électrique (sortie) - chambre 3 : ' ). utf8_decode( $etatSortiePlafondElectrique3), 0, 1, 'l');

        $pdf->Cell(0, 10, utf8_decode( 'Nombre de plafond électrique (sortie) - chambre 1 : ' ). utf8_decode( $nbPlafondElectrique1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Nombre de plafond électrique (sortie) - chambre 2 : ' ). utf8_decode( $nbPlafondElectrique2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Nombre de plafond électrique (sortie) - chambre 3 : ' ). utf8_decode( $nbPlafondElectrique3), 0, 1, 'l');

        // WC - Description et état des murs
        $pdf->Cell(0, 10, utf8_decode( 'Description des murs WC - chambre 1 : ' ). utf8_decode( $descriptionMurWC1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description des murs WC - chambre 2 : ' ). utf8_decode( $descriptionMurWC2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des murs WC (entrée) - chambre 1 : ' ). utf8_decode( $etatWC1Entree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des murs WC (entrée) - chambre 2 : ' ). utf8_decode( $etatWC2Entree), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des murs WC (sortie) - chambre 1 : ' ). utf8_decode( $etatWC1Sortie), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des murs WC (sortie) - chambre 2 : ' ). utf8_decode( $etatWC2Sortie), 0, 1, 'l');

        // WC - Description et état des sols
        $pdf->Cell(0, 10, utf8_decode( 'Description du sol WC - chambre 1 : ' ). utf8_decode( $descriptionSol1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Description du sol WC - chambre 2 : ' ). utf8_decode( $descriptionSol2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol WC (entrée) - chambre 1 : ' ). utf8_decode( $etatEntreeSol1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol WC (entrée) - chambre 2 : ' ). utf8_decode( $etatEntreeSol2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol WC (sortie) - chambre 1 : ' ). utf8_decode( $etatSortieSol1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du sol WC (sortie) - chambre 2 : ' ). utf8_decode( $etatSortieSol2), 0, 1, 'l');

        // WC - Vitrages et volets
        $pdf->Cell(0, 10, utf8_decode( 'Vitrages et volets WC - chambre 1 : ' ). utf8_decode( $vitrageVolet1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Vitrages et volets WC - chambre 2 : ' ). utf8_decode( $vitrageVolet2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages et volets WC (entrée) - chambre 1 : ' ). utf8_decode( $etatEntreeVitrageVolet1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages et volets WC (entrée) - chambre 2 : ' ). utf8_decode( $etatEntreeVitrageVolet2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages et volets WC (sortie) - chambre 1 : ' ). utf8_decode( $etatSortieVitrageVolet1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État des vitrages et volets WC (sortie) - chambre 2 : ' ). utf8_decode( $etatSortieVitrageVolet2), 0, 1, 'l');

        // WC - Tuyauterie
        $pdf->Cell(0, 10, utf8_decode( 'Tuyauterie WC - chambre 1 : ' ). utf8_decode( $tuyauterie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Tuyauterie WC - chambre 2 : ' ). utf8_decode( $tuyauterie2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la tuyauterie WC (entrée) - chambre 1 : ' ). utf8_decode( $etatEntreeTuyauterie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la tuyauterie WC (entrée) - chambre 2 : ' ). utf8_decode( $etatEntreeTuyauterie2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la tuyauterie WC (sortie) - chambre 1 : ' ). utf8_decode( $etatSortieTuyauterie1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État de la tuyauterie WC (sortie) - chambre 2 : ' ). utf8_decode( $etatSortieTuyauterie2), 0, 1, 'l');

        // WC - Luminaire
        $pdf->Cell(0, 10, utf8_decode( 'Luminaire WC - chambre 1 : ' ). utf8_decode( $luminaire1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'Luminaire WC - chambre 2 : ' ). utf8_decode( $luminaire2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du luminaire WC (entrée) - chambre 1 : ' ). utf8_decode( $etatEntreeLuminaire1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du luminaire WC (entrée) - chambre 2 : ' ). utf8_decode( $etatEntreeLuminaire2), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du luminaire WC (sortie) - chambre 1 : ' ). utf8_decode( $etatSortieLuminaire1), 0, 1, 'l');
        $pdf->Cell(0, 10, utf8_decode( 'État du luminaire WC (sortie) - chambre 2 : ' ). utf8_decode( $etatSortieLuminaire2), 0, 1, 'l');
     
        // Zone de commentaire
        $pdf->Cell(0, 10, utf8_decode( 'Zone de commentaire : ' ).utf8_decode( $zoneDeCommentaire), 0, 1, 'L');

        // Envoi du PDF ou du format choisi
        $pdf->Output($fileFormat == 'pdf' ? 'D' : 'I', 'etat_des_lieux.' . $fileFormat); 
        
    }
}

// Création de la page
$controller = new ControllerPartage(new PagePartage());
echo $controller->index();

?>