<?php

namespace Controllers\PagesGestionnaire;
require_once(__DIR__ . "/../../Views/PagesGestionnaire/PageGestionnaire.php");
use Views\PagesGestionnaire\PageGestionnaire;

/**
 * Classe permettant de créer la page de gestionnaire d'états des lieux
 */
class ControllerGestionnaire {

    // Page à initialiser
    private PageGestionnaire $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesGestionnaire\PageGestionnaire $page Page à utiliser
     */
    public function __construct(PageGestionnaire $page) {
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
$controller = new ControllerGestionnaire(new PageGestionnaire());
echo $controller->index();


?>