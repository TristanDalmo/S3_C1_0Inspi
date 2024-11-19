<?php

namespace Controllers\PagesFormulaire;
require_once(__DIR__ . "/../../Views/PagesFormulaire/PageFormulaire.php");
use Views\PagesFormulaire\PageFormulaire;


/**
 * Classe permettant de créer la page de remplissage du formulaire
 */
class ControllerFormulaire {
    // Page à initialiser
    private PageFormulaire $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesFormulaire\PageFormulaire $page Page à utiliser
     */
    public function __construct(PageFormulaire $page) {
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
$controller = new ControllerFormulaire(new PageFormulaire());
echo $controller->index();


?>