<?php

ob_start();

$instance = new GenerationAccueil();

echo $instance->GeneratePage();

ob_end_flush();

class GenerationAccueil extends GenerationPage
{

    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/menu.css",jsChemin: "../metier/Accueil.js");
    }

    protected function GenerateContent() : string
    {
        return "
    <div class=\"creationEtatLieux\">
        <div class=\"boutoncreation\">
            <figure>
                <a href=\"\"> 
                    <img src=\"images/creationEtatLieux.png\" alt=\"Création d'état des lieux\">
                </a>
                <figcaption>
                    <div class=\"description\">
                        <h2>Création d'état des lieux</h2>
                        <p>Cliquez ici pour créer un nouvel état des lieux</p>
                    </div>
                </figcaption>
            </figure>
        </div>
    </div>";
    }



}



?>