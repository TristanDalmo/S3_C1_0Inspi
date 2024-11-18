<?php

namespace Controllers\PagesAccueil; 
require_once(__DIR__ . "/../../Views/PagesAccueil/PageAccueil.php");
use Views\PagesAccueil\PageAccueil;



/**
 * Classe permettant de créer la page d'accueil du site web
 */
class ControllerAccueil {

    // Page à initialiser
    private PageAccueil $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesAccueil\PageAccueil $page Page à utiliser
     */
    public function __construct(PageAccueil $page) {
        $this->page = $page;
    }


    /**
     * Méthode permettant d'afficher le contenu de la page
     * @return string Page web à afficher
     */
    public function index() : string {

        return $this->page->GeneratePage();

    }

}

// Création de la page
$controller = new ControllerAccueil(new PageAccueil());
echo $controller->index();


?>