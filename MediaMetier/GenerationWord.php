<?php

namespace MediaMetier;

use Aspose\Words\Model\Requests\DownloadFileRequest;


require_once(__DIR__ . "/I_GenerationWord.php");
use MediaMetier\I_GenerationWord;

use Aspose\Words\WordsApi;
use Aspose\Words\Model\Requests\GetDocumentRequest;
use Aspose\Words\Model\Requests\UpdateFieldsRequest;
use Aspose\Words\Model\Requests\SaveAsRequest;
use Aspose\Words\Model\ReplaceTextParameters;
use Aspose\Words\Model\Requests\ReplaceTextRequest;
use Aspose\Words\Model\DocxSaveOptionsData;
use Aspose\Words\Model\Requests\CopyFileRequest;
use Aspose\Words\Model\Requests\DeleteFileRequest;

/**
 * Classe permettant de générer un fichier word 
 */
class GenerationWord implements I_GenerationWord {

    private $wordsAPI;

    public function __construct() {
        $this->wordsAPI = new WordsApi("1df1dfc7-488f-4802-9f65-f53d1230510b","87c724d7a2865cb6493fe3d9b117ed3d");
    }


    public function GenererWord(array $donnees, string $cheminFichier) {

        $this->wordsAPI->copyFile(new CopyFileRequest(src_path: "Etat-Des-Lieux(Modele).docx",dest_path: "Etat-Des-Lieux.docx"));

        $document = $this->wordsAPI->getDocument(new GetDocumentRequest("Etat-Des-Lieux.docx"));

        // Préparation des données
        $replacements = [
            'Date d\'entrée' => htmlspecialchars($donnees['fDate'] ?? 'Non renseignée'),
            'Date de sortie' => htmlspecialchars($donnees['fDateS'] ?? 'Non renseignée'),
            'Permis' => htmlspecialchars($donnees['fPermis'] ?? 'Non renseignée'),
            'Autre texte' => htmlspecialchars($donnees['textautre'] ?? 'Non renseignée'),
            'Prénom locataire' => htmlspecialchars($donnees['prenom_locataire'] ?? 'Non renseigné'),
            'Nom locataire' => htmlspecialchars($donnees['nom_locataire'] ?? 'Non renseigné'),
            'Adresse locataire' => htmlspecialchars($donnees['adresse_locataire'] ?? 'Non renseignée'),
            'Prénom bailleur' => htmlspecialchars($donnees['prenom_bailleur'] ?? 'Non renseigné'),
            'Nom bailleur' => htmlspecialchars($donnees['nom_bailleur'] ?? 'Non renseigné'),
            'Adresse bailleur' => htmlspecialchars($donnees['adresse_bailleur'] ?? 'Non renseignée'),
            'surface du bien' => htmlspecialchars($_POST['SURFACE'] ?? 'Non renseignée'),
            'nombre de piece' => htmlspecialchars($_POST['nbpiece'] ?? 'Non renseignée'),
            'civilité du bailleur' => htmlspecialchars($_POST['civilite_bailleur'] ?? 'Non renseignée'),
            'civilité du locataire' => htmlspecialchars($_POST['civilite_locataire'] ?? 'Non renseignée'),
            'Description du mur de la cuisine' => htmlspecialchars($donnees['description_mur_cuisine'] ?? 'Non renseignée'),
            'État du mur de la cuisine (entrée)' => htmlspecialchars($donnees['etat_cuisine_mur_entree'] ?? 'Non renseignée'),
            'État du mur de la cuisine (sortie)' => htmlspecialchars($donnees['etat_cuisine_mur_sortie'] ?? 'Non renseignée'),
            'Description du sol de la cuisine' => htmlspecialchars($donnees['description_sol_cuisine'] ?? 'Non renseignée'),
            'État du sol de la cuisine (entrée)' => htmlspecialchars($donnees['etat_cuisine_sol_entree'] ?? 'Non renseignée'),
            'État du sol de la cuisine (sortie)' => htmlspecialchars($donnees['etat_cuisine_sol_sortie'] ?? 'Non renseignée'),
            'Description des vitrages et volets de la cuisine' => htmlspecialchars($donnees['description_vitrage_volets'] ?? 'Non renseignée'),
            'État des vitrages et volets de la cuisine (entrée)' => htmlspecialchars($donnees['etat_cuisine_vitrage_volets_entree'] ?? 'Non renseignée'),
            'État des vitrages et volets de la cuisine (sortie)' => htmlspecialchars($donnees['etat_cuisine_vitrage_volets_sortie'] ?? 'Non renseignée'),
            'Description du plafond de la cuisine' => htmlspecialchars($donnees['description_plafond_cuisine'] ?? 'Non renseignée'),
            'État du plafond de la cuisine (entrée)' => htmlspecialchars($donnees['etat_cuisine_plafond_entree'] ?? 'Non renseignée'),
            'État du plafond de la cuisine (sortie)' => htmlspecialchars($donnees['etat_cuisine_plafond_sortie'] ?? 'Non renseignée'),
            'Description des éclairages et interrupteurs' => htmlspecialchars($donnees['description_eclairage_interrupteurs'] ?? 'Non renseignée'),
            'État des éclairages et interrupteurs (entrée)' => htmlspecialchars($donnees['etat_cuisine_eclairage_interrupteurs_entree'] ?? 'Non renseignée'),
            'État des éclairages et interrupteurs (sortie)' => htmlspecialchars($donnees['etat_cuisine_eclairage_interrupteurs_sortie'] ?? 'Non renseignée'),

            // Salle de bain
            'Nombre de prises électriques' => htmlspecialchars($donnees['nombre_prise_electrique'] ?? 'Non renseigné'),
            'Description des prises électriques' => htmlspecialchars($donnees['description_prise_electrique'] ?? 'Non renseignée'),
            'État des prises électriques (entrée)' => htmlspecialchars($donnees['etat_cuisine_prise_electrique_entree'] ?? 'Non renseignée'),
            'État des prises électriques (sortie)' => htmlspecialchars($donnees['etat_cuisine_prise_electrique_sortie'] ?? 'Non renseignée'),
            'Description des placards et tiroirs' => htmlspecialchars($donnees['description_placards_tiroirs'] ?? 'Non renseignée'),
            'État des placards et tiroirs (entrée)' => htmlspecialchars($donnees['etat_cuisine_placards_tiroirs_entree'] ?? 'Non renseignée'),
            'État des placards et tiroirs (sortie)' => htmlspecialchars($donnees['etat_cuisine_placards_tiroirs_sortie'] ?? 'Non renseignée'),
            'Description de l\'évier et robinetterie' => htmlspecialchars($donnees['description_evier_robinetterie'] ?? 'Non renseignée'),
            'État de l\'évier et robinetterie (entrée)' => htmlspecialchars($donnees['etat_cuisine_evier_robinetterie_entree'] ?? 'Non renseignée'),
            'État de l\'évier et robinetterie (sortie)' => htmlspecialchars($donnees['etat_cuisine_evier_robinetterie_sortie'] ?? 'Non renseignée'),
            'Description de la plaque de cuisson et four' => htmlspecialchars($donnees['description_plaque_four'] ?? 'Non renseignée'),
            'État de la plaque de cuisson et du four (entrée)' => htmlspecialchars($donnees['etat_cuisine_plaque_four_entree'] ?? 'Non renseignée'),
            'État de la plaque de cuisson et du four (sortie)' => htmlspecialchars($donnees['etat_cuisine_plaque_four_sortie'] ?? 'Non renseignée'),
            'Description de la hotte' => htmlspecialchars($donnees['description_hotte'] ?? 'Non renseignée'),
            'État de la hotte (entrée)' => htmlspecialchars($donnees['etat_cuisine_hotte_entree'] ?? 'Non renseignée'),
            'État de la hotte (sortie)' => htmlspecialchars($donnees['etat_cuisine_hotte_sortie'] ?? 'Non renseignée'),
            'Nom de l\'électroménager' => htmlspecialchars($donnees['electromenager_nom'] ?? 'Non renseigné'),
            'Description de l\'électroménager' => htmlspecialchars($donnees['description_electromenager'] ?? 'Non renseignée'),
            'État de l\'électroménager (entrée)' => htmlspecialchars($donnees['etat_cuisine_electromenager_entree'] ?? 'Non renseignée'),
            'État de l\'électroménager (sortie)' => htmlspecialchars($donnees['etat_cuisine_electromenager_sortie'] ?? 'Non renseignée')
    
        ];

        foreach ($replacements as $field => $value) {
            $replaceOptions = new ReplaceTextParameters();
            $replaceOptions->setOldValue($field);
            $replaceOptions->setNewValue($value);
            $replaceOptions->setIsMatchCase(true);
            $replaceOptions->setIsMatchWholeWord(false);
            $replaceOptions->setIsOldValueRegex(false);

            $this->wordsAPI->replaceText(new ReplaceTextRequest("Etat-Des-Lieux.docx", $replaceOptions));
        }

        // Mettre à jour les champs
        $this->wordsAPI->updateFields(new UpdateFieldsRequest( "Etat-Des-Lieux.docx"));

        // Sauvegarde chez Aspose
        $saveOptions = new DocxSaveOptionsData();
        $saveOptions->setFileName("Etat-Des-Lieux.docx");
        $this->wordsAPI->saveAs(new SaveAsRequest("Etat-Des-Lieux.docx", $saveOptions));

        // Sauvegarde côté serveur E-Lieu
        $this->wordsAPI->downloadFile(new DownloadFileRequest( storage_name: $cheminFichier . "Etat-Des-Lieux.docx", path: "Etat-Des-Lieux.docx"));


        // Suppression du fichier créé à distance
        $this->wordsAPI->deleteFile(new DeleteFileRequest("Etat-Des-Lieux.docx"));

        /*
        
 
        // Salle de bain
        $templateProcessor->setValue('Mur salle de bain 1', htmlspecialchars($donnees['mur_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Mur salle de bain 2', htmlspecialchars($donnees['mur_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur (entrée)', htmlspecialchars($donnees['etat_mur_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur (sortie)', htmlspecialchars($donnees['etat_mur_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol salle de bain 1', htmlspecialchars($donnees['sol_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol salle de bain 2', htmlspecialchars($donnees['sol_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol (entrée)', htmlspecialchars($donnees['etat_sol_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol (sortie)', htmlspecialchars($donnees['etat_sol_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage salle de bain 1', htmlspecialchars($donnees['vitrage_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage salle de bain 2', htmlspecialchars($donnees['vitrage_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du vitrage (entrée)', htmlspecialchars($donnees['etat_vitrage_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du vitrage (sortie)', htmlspecialchars($donnees['etat_vitrage_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('plafond de la salle de bain 1', htmlspecialchars($_POST['plafond_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('plafond de la salle de bain 2', htmlspecialchars($_POST['plafond_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (entrée)', htmlspecialchars($donnees['etat_plafond_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du plafond (sortie)', htmlspecialchars($donnees['etat_plafond_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Éclairage salle de bain 1', htmlspecialchars($donnees['eclairage_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Éclairage salle de bain 2', htmlspecialchars($donnees['eclairage_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (entrée)', htmlspecialchars($donnees['etat_eclairage_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de l\'éclairage (sortie)', htmlspecialchars($donnees['etat_eclairage_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Nombre de prises salle de bain1', htmlspecialchars($donnees['prise_sdb1'] ?? 'Non renseignée')); 
        $templateProcessor->setValue('Nombre de prises salle de bain2', htmlspecialchars($donnees['prise_sdb2'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la prise (entrée)', htmlspecialchars($donnees['etat_prise_entree'] ?? 'Non renseignée'));
        $templateProcessor->setValue('État de la prise (sortie)', htmlspecialchars($donnees['etat_prise_sortie'] ?? 'Non renseignée'));
        $templateProcessor->setValue('Lavabo salle de bain 1', htmlspecialchars($donnees['lavabo_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Lavabo salle de bain 2', htmlspecialchars($donnees['lavabo_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du lavabo (entrée)', htmlspecialchars($donnees['etat_lavabo_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du lavabo (sortie)', htmlspecialchars($donnees['etat_lavabo_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Baignoire salle de bain 1', htmlspecialchars($_POST['baignoire_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Baignoire salle de bain 2', htmlspecialchars($_POST['baignoire_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la baignoire (entrée)', htmlspecialchars($donnees['etat_baignoire_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la baignoire (sortie)', htmlspecialchars($donnees['etat_baignoire_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('WC salle de bain 1', htmlspecialchars($donnees['wc_sdb1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('WC salle de bain 2', htmlspecialchars($donnees['wc_sdb2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des WC (entrée)', htmlspecialchars($donnees['etat_wc_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des WC (sortie)', htmlspecialchars($donnees['etat_wc_sortie'] ?? 'Non renseigné'));
        
        
        // Chambre
        $templateProcessor->setValue('Mur chambre 1', htmlspecialchars($donnees['murChambre1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Mur chambre 2', htmlspecialchars($donnees['murChambre2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Mur chambre 3', htmlspecialchars($donnees['murChambre3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 1 (entrée)', htmlspecialchars($donnees['etatEntreeMur1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 2 (entrée)', htmlspecialchars($donnees['etatEntreeMur2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 3 (entrée)', htmlspecialchars($donnees['etatEntreeMur3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 1 (sortie)', htmlspecialchars($donnees['etatSortieMur1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 2 (sortie)', htmlspecialchars($donnees['etatSortieMur2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du mur 3 (sortie)', htmlspecialchars($donnees['etatSortieMur3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol chambre 1', htmlspecialchars($donnees['solChambre1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol chambre 2', htmlspecialchars($donnees['solChambre2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Sol chambre 3', htmlspecialchars($donnees['solChambre3'] ?? 'Non renseigné'));
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
        $templateProcessor->setValue('Plafond chambre 1', htmlspecialchars($_POST['plafond1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Plafond chambre 2', htmlspecialchars($_POST['plafond2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Plafond chambre 3', htmlspecialchars($_POST['plafond3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds de la chambre 1 (entrée)', htmlspecialchars($_POST['etat_chambre_plafond_entree1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds de la chambre 2 (entrée)', htmlspecialchars($_POST['etat_chambre_plafond_entree2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds de la chambre 3 (entrée)', htmlspecialchars($_POST['etat_chambre_plafond_entree3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds de la chambre 1 (sortie)', htmlspecialchars($_POST['etat_chambre_plafond_sortie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds de la chambre 2 (sortie)', htmlspecialchars($_POST['etat_chambre_plafond_sortie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds de la chambre 3 (sortie)', htmlspecialchars($_POST['etat_chambre_plafond_sortie3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage chambre 1', htmlspecialchars($_POST['eclairageChambre1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage chambre 2', htmlspecialchars($_POST['eclairageChambre2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage chambre 3', htmlspecialchars($_POST['eclairageChambre3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage de la chambre 1 (entrée)', htmlspecialchars($_POST['etat_chambre_eclairage_entree1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage de la chambre 2 (entrée)', htmlspecialchars($_POST['etat_chambre_eclairage_entree2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage de la chambre 3 (entrée)', htmlspecialchars($_POST['etat_chambre_eclairage_entree3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage de la chambre 1 (sortie)', htmlspecialchars($_POST['etat_chambre_eclairage_sortie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage de la chambre 2 (sortie)', htmlspecialchars($_POST['etat_chambre_eclairage_sortie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('eclairage de la chambre 3 (sortie)', htmlspecialchars($_POST['etat_chambre_eclairage_sortie3'] ?? 'Non renseigné'));  
        $templateProcessor->setValue('nombre des plafonds electrique chambre 1', htmlspecialchars($_POST['nbPlafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('nombre des plafonds electrique chambre 2', htmlspecialchars($_POST['nbPlafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('nombre des plafonds electrique chambre 3', htmlspecialchars($_POST['nbPlafondElectrique3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 1', htmlspecialchars($_POST['plafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 2', htmlspecialchars($_POST['plafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrage et volets chambre 3', htmlspecialchars($_POST['plafondElectrique3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds electrique chambre 1 (entrée)', htmlspecialchars($_POST['etatEntreePlafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds electrique chambre 2 (entrée)', htmlspecialchars($_POST['etatEntreePlafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds electrique chambre 3 (entrée)', htmlspecialchars($_POST['etatEntreePlafondElectrique3'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds electrique chambre 1 (sortie)', htmlspecialchars($_POST['etatSortiePlafondElectrique1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds electrique chambre 2 (sortie)', htmlspecialchars($_POST['etatSortiePlafondElectrique2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des plafonds electrique chambre 3 (sortie)', htmlspecialchars($_POST['etatSortiePlafondElectrique3'] ?? 'Non renseigné'));
      
        
        // WC 
        $templateProcessor->setValue('Description des murs WC-1', htmlspecialchars($donnees['description_mur_wc1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Description des murs WC-2', htmlspecialchars($donnees['description_mur_wc2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (entrée)-1', htmlspecialchars($donnees['etat_wc1_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (entrée)-2', htmlspecialchars($donnees['etat_wc2_entree'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (sortie)-1', htmlspecialchars($donnees['etat_wc1_sortie'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des murs WC (sortie)-2', htmlspecialchars($donnees['etat_wc2_sortie'] ?? 'Non renseigné'));   
        $templateProcessor->setValue('Description du sol WC-1', htmlspecialchars($donnees['description_sol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Description du sol WC-2', htmlspecialchars($donnees['description_sol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (entrée)-1', htmlspecialchars($donnees['etat_entree_sol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (entrée)-2', htmlspecialchars($donnees['etat_entree_sol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (sortie)-1', htmlspecialchars($donnees['etat_sortie_sol1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du sol WC (sortie)-2', htmlspecialchars($donnees['etat_sortie_sol2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrages et volets WC-1', htmlspecialchars($donnees['vitrage_volet1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Vitrages et volets WC-2', htmlspecialchars($donnees['vitrage_volet2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (entrée)-1', htmlspecialchars($donnees['etat_entree_vitrage_volet1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (entrée)-2', htmlspecialchars($donnees['etat_entree_vitrage_volet2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (sortie)-1', htmlspecialchars($donnees['etat_sortie_vitrage_volet1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État des vitrages et volets WC (sortie)-2', htmlspecialchars($donnees['etat_sortie_vitrage_volet2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Tuyauterie WC-1', htmlspecialchars($donnees['tuyauterie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Tuyauterie WC-2', htmlspecialchars($donnees['tuyauterie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (entrée)-1', htmlspecialchars($donnees['etat_entree_tuyauterie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (entrée)-2', htmlspecialchars($donnees['etat_entree_tuyauterie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (sortie)-1', htmlspecialchars($donnees['etat_sortie_tuyauterie1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État de la tuyauterie WC (sortie)-2', htmlspecialchars($donnees['etat_sortie_tuyauterie2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Luminaire WC-1', htmlspecialchars($donnees['luminaire1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('Luminaire WC-2', htmlspecialchars($donnees['luminaire2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (entrée)-1', htmlspecialchars($donnees['etat_entree_luminaire1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (entrée)-2', htmlspecialchars($donnees['etat_entree_luminaire2'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (sortie)-1', htmlspecialchars($donnees['etat_sortie_luminaire1'] ?? 'Non renseigné'));
        $templateProcessor->setValue('État du luminaire WC (sortie)-2', htmlspecialchars($donnees['etat_sortie_luminaire2'] ?? 'Non renseigné'));
        
        // Zone de commentaire
        $templateProcessor->setValue('Zone de commentaire', htmlspecialchars($donnees['zone_de_commentaire'] ?? 'Non renseignée'));

        */
    } 
}  
               


?>