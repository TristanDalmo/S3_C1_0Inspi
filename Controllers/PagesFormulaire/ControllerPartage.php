<?php

namespace Controllers\PagesFormulaire;


use Exception;

require_once(__DIR__ . "/../../Views/PagesFormulaire/PagePartage.php");
require_once(__DIR__."/../../Service/Media/MediaService.php");
require_once(__DIR__ . "/../../Views/PagesFormulaire/PageErreur.php");
require_once(__DIR__ . "/../../Service/Media/DossiersManagerService.php");
require_once(__DIR__ . "/../../Service/Media/GenerationWordService.php");
require_once(__DIR__ . "/../../Service/GestionFormulaire/InsertionEDLService.php");
require_once(__DIR__ . "/../../Service/Media/GenerationPDFService.php");

use Views\PagesFormulaire\PagePartage;
use Service\MediaService\MediaService;
use Views\PagesFormulaire\pageErreur;
use Service\Media\DossiersManagerService;
use Service\Media\GenerationWordService;
use Service\GestionFormulaire\InsertionEDLService;
use Service\Media\GenerationPDFService;



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

                if ($hasValidFiles) {
                    $mediaService->InsertionMedias($_FILES['Documents'],$Dossier_Cible);
                } 
            } 

            #endregion

            // Gestion de l'insertion dans la BDD
            $insertion=new InsertionEDLService();
            $insertion->InsererEDL($_POST);
            /*
            // Gestion de la création du fichier Word
            $generationWord = new GenerationWordService();
            $generationWord->GenererWord($_POST,$Dossier_Cible);
            
            // Gestion de la création du fichier pdf
            $generationPDF = new GenerationPDFService();
            $generationPDF->GenererPDF($Dossier_Cible);
            */

            // Affichage de la page en cas de succès
            $newPage=$this->page->GeneratePage();
        }
        catch(Exception $e)
        {
            (new DossiersManagerService())->rmdir_recursif($Dossier_Cible);
            $pageerror = new pageErreur(messageErreur: $e->getMessage());
            $newPage= $pageerror->GeneratePage();  
            
        }
            
        
        return $newPage;

    }

}

// Création de la page
$controller = new ControllerPartage(new PagePartage());
echo $controller->index();
