<?php

require_once(__DIR__ . "/AbstractGenerationPage.php");

/**
 * Classe de génération de la page d'accueil de l'application
 */
class GenerationTableauDeBord extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/formulaire.css",nom:"E-Lieu ~ Tableau de bord");
    }

    protected function GenerateContent() : string
    {
        return "<p>TABLEAU DE BORD </p>";
    }

}

?>