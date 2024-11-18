<?php

namespace Controllers\PagesAccueil;
require_once(__DIR__ . "/../../Views/PagesAccueil/PageConfidentialite.php");
use Views\PagesAccueil\PageConfidentialite;

/**
 * Classe permettant de créer la page de clauses de confidentialité
 */
class ControllerConfidentialite {

    // Page à initialiser
    private PageConfidentialite $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesAccueil\PageConfidentialite $page Page à utiliser
     */
    public function __construct(PageConfidentialite $page) {
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
$controller = new ControllerConfidentialite(new PageConfidentialite());
echo $controller->index();


?>