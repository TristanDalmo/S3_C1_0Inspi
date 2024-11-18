<?php

namespace Controllers\PagesAccueil;
require_once(__DIR__ . "/../../Views/PagesAccueil/PageAPropos.php");
use Views\PagesAccueil\PageAPropos;

/**
 * Classe permettant de créer la page "À propos"
 */
class ControllerAPropos {

    // Page à initialiser
    private PageAPropos $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesAccueil\PageAPropos $page Page à utiliser
     */
    public function __construct(PageAPropos $page) {
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
$controller = new ControllerAPropos(new PageAPropos());
echo $controller->index();


?>