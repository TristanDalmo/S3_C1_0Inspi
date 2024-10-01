<?php

require_once("AbstractGenerationPage.php");

/**
 * Classe de génération de la page d'accueil de l'application
 */
class GenerationAccueil extends AbstractGenerationPage
{

    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/menu.css",jsChemin: "../metier/Accueil.js");
    }

    protected function GenerateContent() : string
    {
        return "
    <div class=\"Boutons\">
            <div class=\"creationEtatLieux\" id=\"Gestionnaire\">
                <div class=\"boutoncreation\">
                    <figure>
                        <img src=\"images/GestionnaireEtatLieux.png\" alt=\"Gestion des états des lieux\">
                        <figcaption>
                            <div class=\"description\">
                                <h2>Gestion des États des lieux</h2>
                                <p>Cliquez ici pour gérer tous vos états des lieux</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class=\"creationEtatLieux\" id=\"CreerFormulaire\">
                <div class=\"boutoncreation\">
                    <figure>
                        <img src=\"images/creationEtatLieux.png\" alt=\"Création d'état des lieux\">
                        <figcaption>
                            <div class=\"description\">
                                <h2>Création d'état des lieux</h2>
                                <p>Cliquez ici pour créer un nouvel état des lieux</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class=\"creationEtatLieux\" id=\"TableauDeBord\">
                <div class=\"boutoncreation\">
                    <figure>
                        <img src=\"images/PanneauConfiguration.png\" alt=\"Tableau de bord\">
                        <figcaption>
                            <div class=\"description\">
                                <h2>Tableau de Bord</h2>
                                <p>Cliquez ici pour afficher votre tableau de bord</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>";
    }



}

$instance = new GenerationAccueil();

echo $instance->GeneratePage();

?>