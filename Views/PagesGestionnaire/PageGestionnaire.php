<?php

namespace Views\PagesGestionnaire;
require_once(__DIR__ . "/../AbstractPage.php");
use Views\AbstractPage;

/**
 * Classe de génération du gestionnaire d'états des lieux de l'application
 */
class PageGestionnaire extends AbstractPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/gestionnaire.css",nom:"E-Lieu ~ Gestionnaire");
    }

    protected function GenerateContent() : string
    {
        return "<p>GESTIONNAIRE DES ÉTATS DES LIEUX</p>";
    }

}

?>