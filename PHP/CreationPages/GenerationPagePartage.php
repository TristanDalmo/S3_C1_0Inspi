<?php

require_once(__DIR__ . "/AbstractGenerationPage.php");

/**
 * Classe de génération de la page de partage d'un état des lieux
 */
class GenerationPagePartage extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/menu.css",nom:"E-Lieu ~ Partage et Export");
    }

    protected function GenerateContent() : string
    {
        return "<p>PARTAGE DE L'ÉTAT DES LIEUX</p>";
    }

}

?>