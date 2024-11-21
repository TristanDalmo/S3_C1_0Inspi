<?php

namespace Controllers\PagesFormulaire;

use Exception;

require_once(__DIR__ . "/../../Views/PagesFormulaire/PagePartage.php");
use Views\PagesFormulaire\PagePartage;
use Service\MediaService\MediaService;
require_once(__DIR__."/../../Service/Media/MediaService.php");
use Views\PagesFormulaire\pageErreur;
require_once(__DIR__ . "/../../Views/PagesFormulaire/PageErreur.php");

require_once(__DIR__ . "/../../Service/Media/DossiersManagerService.php");
use Service\Media\DossiersManagerService;


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

        $newPage=null;

        // Définition du dossier dans lequel on enverra les médias et les fichiers docx et pdf (on utilisera 2 variables aléatoires indépendantes qui rendront le nom du dossier unique)
        $Dossier_Cible = "../../MediasClients/" . time() . uniqid() . "/";

        try
        {
            // Crée le dossier si nécessaire
            mkdir(directory: $Dossier_Cible,permissions: 0777,recursive: true);


            $mediaService = new MediaService();
            if (isset($_FILES['Documents']) && is_array($_FILES['Documents']['error']))
            {
                
                $hasValidFiles = false;

                // Parcourt chaque fichier pour voir s'il est valide
                foreach ($_FILES['Documents']['error'] as $error) {
                    if ($error === UPLOAD_ERR_OK) {
                        $hasValidFiles = true; // Au moins un fichier valide a été trouvé
                        break;
                    }
                }
        
                if ($hasValidFiles) {
                    $mediaService->InsertionMedias($_FILES['Documents'],$Dossier_Cible);
                } 
        
                
            } 
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


?>