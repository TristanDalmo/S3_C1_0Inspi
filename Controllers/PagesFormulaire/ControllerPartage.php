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
        
            // Parcourt toutes les clés de $_POST et affiche le nom du champ et sa valeur
            foreach ($_POST as $key => $value) {
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
        return $this->page->GeneratePage();

    }  
    function generatePDF()
    {
        // Récupération des données du formulaire
        $fDate = htmlspecialchars($_POST['ftype'] ?? 'Non renseignée');
        $fDateS = htmlspecialchars($_POST['fDateS'] ?? 'Non renseignée');
        $fPermis = htmlspecialchars($_POST['fPermis'] ?? 'Non renseigné');
        
        // Logement
        $typeLogement = htmlspecialchars($_POST['typeLogement'] ?? 'Non spécifié');
        $surface = htmlspecialchars($_POST['SURFACE'] ?? 'Non renseignée');
        $nbPiece = htmlspecialchars($_POST['nbpiece'] ?? 'Non renseigné');
        $adresse = htmlspecialchars($_POST['adresse'] ?? 'Non renseignée');
        
        // Bailleur
        $civiliteBailleur = htmlspecialchars($_POST['civilite_bailleur'] ?? 'Non spécifiée');
        $prenomBailleur = htmlspecialchars($_POST['prenom_bailleur'] ?? 'Non renseigné');
        $nomBailleur = htmlspecialchars($_POST['nom_bailleur'] ?? 'Non renseigné');
        $adresseBailleur = htmlspecialchars($_POST['adresse_bailleur'] ?? 'Non renseignée');
        
        // Locataire
        $civiliteLocataire = htmlspecialchars($_POST['civilite_locataire'] ?? 'Non spécifiée');
        $prenomLocataire = htmlspecialchars($_POST['prenom_locataire'] ?? 'Non renseigné');
        $nomLocataire = htmlspecialchars($_POST['nom_locataire'] ?? 'Non renseigné');
        $adresseLocataire = htmlspecialchars($_POST['adresse_locataire'] ?? 'Non renseignée');
    
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
    
        // Envoi du fichier PDF
        $pdf->Output('D', 'etat_des_lieux.pdf'); // Envoi du PDF au navigateur pour téléchargement
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