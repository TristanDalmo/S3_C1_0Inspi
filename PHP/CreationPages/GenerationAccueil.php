<?php

require_once(__DIR__ . "/AbstractGenerationPage.php");

/**
 * Classe de génération de la page d'accueil de l'application
 */
class GenerationAccueil extends AbstractGenerationPage
{

    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/menu.css", nom: "E-Lieu ~ Page d'Accueil");
    }

    protected function GenerateContent() : string
    {
        return "
        <div class=\"Boutons\">
            <div class=\"creationEtatLieux\">
                <div class=\"boutoncreation\">
                    
                        <figure id=\"TableauDeBord\">
                        <a class=\"boutonAccueil\" href=\"PagesFactory.php?page=TableauDeBord\">
                            <img src=\"../SiteWeb/images/PanneauConfiguration.png\" alt=\"Tableau de bord\">
                            <figcaption>
                                <div class=\"description\">
                                    <h2>Tableau de Bord</h2>
                                    <p>Cliquez ici pour afficher votre tableau de bord</p>
                                </div>
                              </a>  
                            </figcaption>
                        </figure>
                    
                </div>
            </div>

            <div class=\"creationEtatLieux\">
                <div class=\"boutoncreation\">
                    <figure id=\"CreerFormulaire\">
                        <a class=\"boutonAccueil\"href=\"PagesFactory.php?page=Formulaire\">
                        <img src=\"../SiteWeb/images/creationEtatLieux.png\" alt=\"Création d'état des lieux\">
                        <figcaption>
                            <div class=\"description\">
                                <h2>Création d'état des lieux</h2>
                                <p>Cliquez ici pour créer un nouvel état des lieux</p>
                            </div>
                            </a>
                        </figcaption>
                        
                    </figure>
                </div>
            </div>

            <div class=\"creationEtatLieux\">
                <div class=\"boutoncreation\">
                    <figure id=\"Gestionnaire\">
                        <a class=\"boutonAccueil\"href=\"PagesFactory.php?page=Gestionnaire\">
                        <img src=\"../SiteWeb/images/GestionnaireEtatLieux.png\" alt=\"Gestion des états des lieux\">
                        <figcaption>
                            <div class=\"description\">
                                <h2>Gestion des États des lieux</h2>
                                <p>Cliquez ici pour gérer tous vos états des lieux</p>
                            </div>
                            </a>
                        </figcaption>
                        
                    </figure>
                </div>
            </div>


        </div>";
    }



}

?>