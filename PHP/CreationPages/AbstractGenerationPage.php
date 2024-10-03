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
     * Nom de la page web
     * @var string
     */
    private string $nom = "";

    #endregion 

    #region Génération de la page et constructeur

    /**
     * Constructeur de la classe
     * @param string $cssChemin Chemin vers le fichier css de la page
     */
    public function __construct($cssChemin, string $nom)
    {
        $this->cssChemin = $cssChemin;
        $this->nom = $nom;
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
        return "<!DOCTYPE html>
            <html lang=\"fr\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>". $this->nom . "</title>
                <link rel=\"stylesheet\" href=\"" . $this->cssChemin . "\">
                <link rel=\"stylesheet\" href=\"/S3_C1_0Inspi/SiteWeb/styleHeaderFooter.css\">
                <link rel=\"icon\" href=\"/S3_C1_0Inspi/SiteWeb/images/logoE-Lieu.ico\"/>
            </head>
            <header>
                <img src=\"/S3_C1_0Inspi/SiteWeb/images/logoE-Lieu.png\" id=\"logo\" alt=\"\">
                <h1>E-Lieu</h1>
            </header>"
                ;
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
                    <li id=\"APropos\"><a href=\"/S3_C1_0Inspi/PHP/CreationPages/PagesSecondaires/GenerationAPropos.php\">À propos</a></li>
                    <li id=\"Confidentialite\"><a href=\"/S3_C1_0Inspi/PHP/CreationPages/PagesSecondaires/GenerationConditions.php\">Politique de confidentialité</a></li>
                    <li id=\"Conditions\"><a href=\"/S3_C1_0Inspi/PHP/CreationPages/PagesSecondaires/GenerationConfidentialite.php\">Conditions d'utilisation</a></li>
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