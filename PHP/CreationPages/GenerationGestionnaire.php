<?php

require_once("AbstractGenerationPage.php");

/**
 * Classe de génération de la page d'accueil de l'application
 */
class GenerationGestionnaire extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/gestionnaire.css",nom:"E-Lieu ~ Gestionnaire");
    }

    protected function GenerateContent() : string
    {
        return "<p>GESTIONNAIRE DES ÉTATS DES LIEUX</p>";
    }

}


$instance = new GenerationGestionnaire();

echo $instance->GeneratePage();


?>