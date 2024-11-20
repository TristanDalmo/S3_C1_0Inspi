<?php

namespace Controllers\PagesFormulaire;

use FPDF;
use ZipArchive;
require_once(__DIR__ . "/../../Views/PagesFormulaire/PagePartage.php");
use Views\PagesFormulaire\PagePartage;

use PhpOffice\PhpWord\PhpWord;




require_once (__DIR__ . "/../../bibliotheque/fpdf186/fpdf.php");

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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h1>Détails du formulaire soumis</h1>";
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr><th>Nom du champ</th><th>Valeur</th></tr>";

            $compteur=0;
        
            // Parcourt toutes les clés de $_POST et affiche le nom du champ et sa valeur
            foreach ($_POST as $key => $value) {
                $compteur++;
                // Pour les champs de type tableau ou texte long, il peut être utile de vérifier si le champ est un tableau.
                // Si le champ est un tableau (comme les cases à cocher ou les boutons radio), il sera affiché sous forme de liste.
                echo "". $key ."". $value ."";
                if (is_array($value)) {
                    echo "<tr><td>" . htmlspecialchars($key) . "</td><td>";
                    echo "<ul>";

                    foreach ($value as $v) {
                        echo "<li>" . htmlspecialchars($v) . "</li>";
                    }
                    echo "</ul>";
                    echo "</td></tr>";
                } else {
                    echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
                }
            }
            echo "</table>";
        } else {
            echo "Aucune donnée soumise.";
        }
        echo($compteur);
        return $this->page->GeneratePage();

    }  
    function generatePDF()
    {
        // Récupération des données du formulaire
        $fDate = htmlspecialchars($_POST['fDate'] ?? 'Non renseignée');
        $fDateS = htmlspecialchars($_POST['fDateS'] ?? 'Non renseignée');
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

        // Création du PDF avec FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Utiliser une police TrueType compatible UTF-8 (comme DejaVu)
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Etat des Lieux', 0, 1, 'C');

        // Titre
        $pdf->Cell(0, 10, 'Etat des Lieux', 0, 1, 'C');
        $pdf->Cell(0, 10, '(Conforme LOI ALUR)', 0, 1, 'C');

        // Date d'entrée
        $pdf->Ln(5);
        $pdf->Cell(0, 10, 'Date d\'entrée : ' . $fDate, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Permis : ' . $fPermis, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Date de sortie : ' . $fDateS, 0, 1, 'L');

        // Loi
        $pdf->Ln(10);
        $pdf->MultiCell(0, 10, "");

        // Logement
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Logement', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Type de logement : ' . $typeLogement, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Surface : ' . $surface . ' m²', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Nombre de pièces principales : ' . $nbPiece, 0, 1, 'L');
        $pdf->MultiCell(0, 10, 'Adresse : ' . $adresse);

        // Bailleur
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Le Bailleur (ou son mandataire)', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Civilité : ' . $civiliteBailleur, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Prénom : ' . $prenomBailleur, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Nom : ' . $nomBailleur, 0, 1, 'L');
        $pdf->MultiCell(0, 10, 'Adresse : ' . $adresseBailleur);

        // Locataire
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Le(s) Locataire(s)', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Civilité : ' . $civiliteLocataire, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Prénom : ' . $prenomLocataire, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Nom : ' . $nomLocataire, 0, 1, 'L');
        $pdf->MultiCell(0, 10, 'Adresse : ' . $adresseLocataire);

        // Section des chambres, cuisine, salle de bains, WC, et autres éléments
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la cuisine', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des murs : ' . $descriptionmurcuisine, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs à l\'entrée : ' . $etatcuisinemurentree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs à la sortie : ' . $etat_cuisine_mur_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du sol : ' . $description_sol_cuisine, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol à l\'entrée : ' . $etat_cuisine_sol_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol à la sortie : ' . $etat_cuisine_sol_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du vitrage et des volets : ' . $description_vitrage_volets, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du vitrage et des volets à l\'entrée : ' . $etat_cuisine_vitrage_volets_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du vitrage et des volets à la sortie : ' . $etat_cuisine_vitrage_volets_sortie, 0, 1, 'L');

                // Cuisine - Eclairage, interrupteurs, prises électriques, etc.
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la cuisine - Eclairage et accessoires', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description de l\'éclairage et interrupteurs : ' . $description_eclairage_interrupteurs, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat de l\'éclairage et des interrupteurs à l\'entrée : ' . $etat_cuisine_eclairage_interrupteurs_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat de l\'éclairage et des interrupteurs à la sortie : ' . $etat_cuisine_eclairage_interrupteurs_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Nombre de prises électriques : ' . $nombre_prise_electrique, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des prises électriques : ' . $description_prise_electrique, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des prises électriques à l\'entrée : ' . $etat_cuisine_prise_electrique_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des prises électriques à la sortie : ' . $etat_cuisine_prise_electrique_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description des placards et tiroirs : ' . $description_placards_tiroirs, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des placards et tiroirs à l\'entrée : ' . $etat_cuisine_placards_tiroirs_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des placards et tiroirs à la sortie : ' . $etat_cuisine_placards_tiroirs_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description de l\'évier et robinetterie : ' . $description_evier_robinetterie, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat de l\'évier et de la robinetterie à l\'entrée : ' . $etat_cuisine_evier_robinetterie_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat de l\'évier et de la robinetterie à la sortie : ' . $etat_cuisine_evier_robinetterie_sortie, 0, 1, 'L');

        // Cuisine - Plaques, hotte, électroménager
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la cuisine - Equipements', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des plaques et du four : ' . $description_plaque_four, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des plaques et du four à l\'entrée : ' . $etat_cuisine_plaque_four_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des plaques et du four à la sortie : ' . $etat_cuisine_plaque_four_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description de la hotte : ' . $description_hotte, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat de la hotte à l\'entrée : ' . $etat_cuisine_hotte_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat de la hotte à la sortie : ' . $etat_cuisine_hotte_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description des appareils électroménagers : ' . $description_electromenager, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des appareils électroménagers à l\'entrée : ' . $etat_cuisine_electromenager_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des appareils électroménagers à la sortie : ' . $etat_cuisine_electromenager_sortie, 0, 1, 'L');

        // Salle de bains - Murs, sol, vitrage
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la salle de bains', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des murs (Salle de bains) : ' . $description_mur_sdb1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs à l\'entrée (Salle de bains) : ' . $etat_mur_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs à la sortie (Salle de bains) : ' . $etat_mur_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du sol (Salle de bains) : ' . $sol_sdb1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol à l\'entrée (Salle de bains) : ' . $etat_sol_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol à la sortie (Salle de bains) : ' . $etat_sol_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du vitrage (Salle de bains) : ' . $vitrage_sdb1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du vitrage à l\'entrée (Salle de bains) : ' . $etat_vitrage_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du vitrage à la sortie (Salle de bains) : ' . $etat_vitrage_sortie, 0, 1, 'L');

        // Salle de bains - Eclairage, prises, lavabo, baignoire
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la salle de bains - Equipements', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Eclairage à l\'entrée : ' . $etat_eclairage_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Eclairage à la sortie : ' . $etat_eclairage_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Prises électriques à l\'entrée : ' . $etat_prise_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Prises électriques à la sortie : ' . $etat_prise_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Lavabo à l\'entrée : ' . $etat_lavabo_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Lavabo à la sortie : ' . $etat_lavabo_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Baignoire à l\'entrée : ' . $etat_baignoire_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Baignoire à la sortie : ' . $etat_baignoire_sortie, 0, 1, 'L');

        // WC - Murs, sol, accessoires
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux des WC', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des murs des WC : ' . $description_mur_wc1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs des WC à l\'entrée : ' . $etat_wc1_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs des WC à la sortie : ' . $etat_wc1_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du sol des WC : ' . $description_sol1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol des WC à l\'entrée : ' . $etat_entree_sol1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol des WC à la sortie : ' . $etat_sortie_sol1, 0, 1, 'L');
        // WC - Vitrage, tuyauterie, luminaires
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux des WC - Equipements', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Vitrage des WC à l\'entrée : ' . $etat_entree_vitrage_volet1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Vitrage des WC à la sortie : ' . $etat_sortie_vitrage_volet1, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Tuyauterie des WC à l\'entrée : ' . $etat_entree_tuyauterie1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Tuyauterie des WC à la sortie : ' . $etat_sortie_tuyauterie1, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Luminaire des WC à l\'entrée : ' . $etat_entree_luminaire1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Luminaire des WC à la sortie : ' . $etat_sortie_luminaire1, 0, 1, 'L');

        // Chambre - Murs, sol, vitrage
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la chambre', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des murs de la chambre 1 : ' . $murChambre1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs de la chambre 1 à l\'entrée : ' . $etatEntreeMur1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs de la chambre 1 à la sortie : ' . $etatSortieMur1, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du sol de la chambre 1 : ' . $solChambre1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol de la chambre 1 à l\'entrée : ' . $etat_cuisine_sol_entree1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol de la chambre 1 à la sortie : ' . $etat_cuisine_sol_sortie1, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Vitrage de la chambre 1 à l\'entrée : ' . $etat_cuisine_vitrages_entree1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Vitrage de la chambre 1 à la sortie : ' . $etat_cuisine_vitrages_sortie1, 0, 1, 'L');

        // Chambre - Plafond, éclairage
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des lieux de la chambre - Plafond et éclairage', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Plafond de la chambre 1 à l\'entrée : ' . $etat_cuisine_plafond_entree1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Plafond de la chambre 1 à la sortie : ' . $etat_cuisine_plafond_sortie1, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Eclairage de la chambre 1 à l\'entrée : ' . $etat_chambre_eclairage_entree1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Eclairage de la chambre 1 à la sortie : ' . $etat_chambre_eclairage_sortie1, 0, 1, 'L');

        // Plafond Electrique - Chambre
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des plafonds électriques', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Plafond électrique de la chambre 1 : ' . $plafondElectrique1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du plafond électrique de la chambre 1 à l\'entrée : ' . $etatEntreePlafondElectrique1, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du plafond électrique de la chambre 1 à la sortie : ' . $etatSortiePlafondElectrique1, 0, 1, 'L');

        // WC - Accessoires et plomberie
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Etat des accessoires et plomberie des WC', 0, 1, 'L');
        $pdf->Cell(0, 10, 'Description des murs WC 2 : ' . $description_mur_wc2, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs WC 2 à l\'entrée : ' . $etat_wc2_entree, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat des murs WC 2 à la sortie : ' . $etat_wc2_sortie, 0, 1, 'L');

        $pdf->Cell(0, 10, 'Description du sol WC 2 : ' . $description_sol2, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol WC 2 à l\'entrée : ' . $etat_entree_sol2, 0, 1, 'L');
        $pdf->Cell(0, 10, 'Etat du sol WC 2 à la sortie : ' . $etat_sortie_sol2, 0, 1, 'L');

        // Finalisation du PDF
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Commentaires supplémentaires : ' . $zone_de_commentaire, 0, 1, 'L');

        // Envoi du fichier PDF
        $pdf->Output('D', 'etat_des_lieux.pdf'); // Envoi du PDF au navigateur pour téléchargement

      

        // Finalisation et envoi du PDF
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Commentaire(s) supplémentaire(s) : ', 0, 1, 'L');
        $pdf->MultiCell(0, 10, $zoneDeCommentaire);

        // Envoi du fichier PDF
        $pdf->Output($fileFormat == 'pdf' ? 'D' : 'I', 'etat_des_lieux.' . $fileFormat); // Envoi du PDF ou du format choisi




}



    function generateWord() {
        // Récupération des données du formulaire
        $name = htmlspecialchars($_POST['name'] ?? 'Nom inconnu');
        $email = htmlspecialchars($_POST['email'] ?? 'Email inconnu');
    
        // Contenu Word XML (format pour un fichier docx)
        $content = "
            <w:document xmlns:w='http://schemas.openxmlformats.org/wordprocessingml/2006/main'>
                <w:body>
                    <w:p>
                        <w:r><w:t>Etat des Lieux</w:t></w:r>
                    </w:p>
                    <w:p>
                        <w:r><w:t>Nom : $name</w:t></w:r>
                    </w:p>
                    <w:p>
                        <w:r><w:t>Email : $email</w:t></w:r>
                    </w:p>
                </w:body>
            </w:document>
        ";
    
        // Créer un flux en mémoire pour le fichier ZIP
        $zip = new ZipArchive();
        $zipFileName = "php://output";  // Utiliser le flux de sortie pour envoyer directement le fichier
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Ajouter le contenu du fichier Word dans le ZIP
            $zip->addFromString("word/document.xml", $content);
            $zip->addEmptyDir("word/_rels");
            $zip->addEmptyDir("_rels");
            $zip->addEmptyDir("docProps");
            
            // Fermer le fichier ZIP pour que les modifications prennent effet
            $zip->close();
    
            // Définir les en-têtes pour envoyer un fichier Word
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Disposition: attachment; filename="etat_des_lieux.docx"');
    
            // Le fichier est envoyé directement au client sans être enregistré localement
            readfile($zipFileName);
        } else {
            echo "Erreur lors de la création du fichier Word.";
        }
    }

}

// Création de la page
$controller = new ControllerPartage(new PagePartage());
echo $controller->index();


?>