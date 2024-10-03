<?php

/**
 * Classe abstraite de génération de page
 */
abstract class AbstractGenerationPage 
{
    #region Attributs

    /**
     * Chemin vers le fichier css de la page (redéfini selon la classe de la page à générer)
     * @var string
     */
    private string $cssChemin = "";

    /**
     * Chemin vers le fichier javascript de la page (s'il en a un)
     * @var string
     */
    private ?string $jsChemin = "";

    /**
     * Nom de la page web
     * @var string
     */
    private string $nom = "";

    #endregion 

    #region Génération de la page et constructeur

    /**
     * Constructeur de la classe
     * @param string $cssChemin Chemin vers le fichier css de la page
     * @param string $nom Nom de la page
     * @param string $jsChemin Chemin vers l'éventuel fichier js de la page
     */
    public function __construct($cssChemin, string $nom, ?string $jsChemin = null)
    {
        $this->cssChemin = $cssChemin;
        $this->nom = $nom;
        $this->jsChemin = $jsChemin;
    }

    /**
     * Méthode de génération de la page entière à partir des méthodes suivantes
     * @return string
     */
    public function GeneratePage() : string {
        return $this->GenerateHead() . $this->GenerateContent() . $this->GenerateFooter();
    }

    #endregion

    #region Génération des parties de la page

    /**
     * Méthode permettant de générer l'entête de la page
     * @return string
     */
    public function GenerateHead(): string
    {
        $retour = "<!DOCTYPE html>
            <html lang=\"fr\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>". $this->nom . "</title>
                <link rel=\"stylesheet\" href=\"" . $this->cssChemin . "\">";
        
        
        if ( $this->jsChemin !== null )
        {
            $retour .= "<script src=" . $this->jsChemin . "></script>";
        }

        $retour .= "<link rel=\"stylesheet\" href=\"../SiteWeb/styleHeaderFooter.css\">
                <link rel=\"icon\" href=\"../SiteWeb/images/logoE-Lieu.ico\"/>
            </head>
            <header>
                <div class=\"centreeDansHeader\" id=\"backAccueil\">
                    <a href=\"PagesFactory.php?page=Accueil\">
                        <img src=\"../SiteWeb/images/home.png\" id=\"pictogrammeAccueil\" alt=\"\">
                        <p id=\"texteAccueil\">Accueil</p>
                    </a>
                </div>
                <div id=\"logoDiv\">
                    <img src=\"../SiteWeb/images/logoE-Lieu.png\" id=\"logo\" alt=\"\">
                    <h1>E-Lieu</h1>
                </div>
                <div class=\"centreeDansHeader\" id=\"LoginCompte\">
                    <p>Connecté en tant que : test</p>
                </div>
                
            </header>"
                ;

        return $retour;
    }

    /**
     * Méthode permettant de générer le contenu d'une page PHP 
     * @return string
     */
    abstract protected function GenerateContent() : string;

    /**
     * Méthode permettant de générer le bas de page
     * @return string
     */
    public function GenerateFooter() : string
    {
        return "<footer>
        <div class=\"footer-container\">
            <div class=\"footer-info\">
                <h2>Contactez-nous</h2>
                <p>Email : contact@exemple.com</p>
                <p>Téléphone : +33 1 23 45 67 89</p>
            </div>
            <div class=\"footer-links\">
                <h2>Liens utiles</h2>
                <ul>
                    <li id=\"APropos\"><a href=\"PagesFactory.php?page=APropos\">À propos</a></li>
                    <li id=\"Confidentialite\"><a href=\"PagesFactory.php?page=Confidentialite\">Politique de confidentialité</a></li>
                    <li id=\"Conditions\"><a href=\"PagesFactory.php?page=Conditions\">Conditions d'utilisation</a></li>
                </ul>
            </div>
          
        </div>
        <div class=\"footer-bottom\">
            <p>&copy; 2024 Exemple. Tous droits réservés.</p>
        </div>
    </footer>";
    }

    #endregion

}


?>