<?php

namespace Controllers\PagesTableauDeBord;
require_once(__DIR__ . "/../../Views/PagesTableauDeBord/PageTableauDeBord.php");
use Views\PagesTableauDeBord\PageTableauDeBord;

/**
 * Classe permettant de créer la page du tableau de bord
 */
class ControllerTableauDeBord {

    // Page à initialiser
    private PageTableauDeBord $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesTableauDeBord\PageTableauDeBord $page Page à utiliser
     */
    public function __construct(PageTableauDeBord $page) {
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
$controller = new ControllerTableauDeBord(new PageTableauDeBord());
echo $controller->index();


?>