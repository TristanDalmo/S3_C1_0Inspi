<?php

namespace Controllers\PagesFormulaire;
require_once(__DIR__ . "/../../Views/PagesFormulaire/PagePartage.php");
use Views\PagesFormulaire\PagePartage;
use MediaService\MediaService;
require_once(__DIR__."/././Service/Media/MediaService.php");

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


        try
        {
            $mediaService = new MediaService();
            if (isset($_FILES))
            {
                $mediaService->InsertionMedias($_FILES);
            } 
        }
        catch
        {
            
        }

        return $this->page->GeneratePage();

    }

}

// Création de la page
$controller = new ControllerPartage(new PagePartage());
echo $controller->index();


?>