<?php

namespace Views\PagesTableauDeBord;
require_once(__DIR__ . "/../AbstractPage.php");
use Views\AbstractPage;

/**
 * Classe de génération de la page de tableau de bord de l'application
 */
class PageTableauDeBord extends AbstractPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/formulaire.css",nom:"E-Lieu ~ Tableau de bord");
    }

    protected function GenerateContent() : string
    {
        return "<p>TABLEAU DE BORD </p>";
    }

}

?>