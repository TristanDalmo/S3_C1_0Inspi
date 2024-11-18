<?php

namespace Controllers\PagesAccueil;
require_once(__DIR__ . "/../../Views/PagesAccueil/PageConditions.php");
use Views\PagesAccueil\PageConditions;

/**
 * Classe permettant de créer la page de Conditions d'utilisations
 */
class ControllerConditions {

    // Page à initialiser
    private PageConditions $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesAccueil\PageConditions $page Page à utiliser
     */
    public function __construct(PageConditions $page) {
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
$controller = new ControllerConditions(new PageConditions());
echo $controller->index();


?>