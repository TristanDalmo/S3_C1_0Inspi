<?php

/**
 * Classe abstraite de génération de page
 */
abstract class GenerationPage 
{
    #region Attributs

    /**
     * Chemin vers le fichier css de la page (redéfini selon la classe de la page à générer)
     * @var string
     */
    private string $cssChemin = "";

    /**
     * Chemin vers le fichier javascript de la page (redéfini selon la classe de la page à générer
     * @var string 
     */
    private string $jsChemin = "";

    #endregion 

    #region Génération de la page et constructeur

    /**
     * Constructeur de la classe
     * @param string $cssChemin Chemin vers le fichier css de la page
     * @param string $jsChemin Chemin vers le script js de la page
     */
    public function __construct($cssChemin, $jsChemin)
    {
        $this->cssChemin = $cssChemin;
        $this->jsChemin = $jsChemin;
        
    }

    /**
     * Méthode de génération de la page entière à partir des méthodes suivantes
     * @return string
     */
    public function GeneratePage() : string {
        return $this->GenerateHead() + $this->GenerateContent() + $this->GenerateFooter();
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
                <title>E-Lieu</title>
                <link rel=\"stylesheet\" href=\"" + $this->cssChemin + "\">
                <script src=\"" + $this->jsChemin + "\"></script>
            </head>";
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
        return "    <div class=\"footer\">
                        <a href=\"\">
                            <p>Contact</p>
                        </a>
                    </div>
                    </body>
                    </html>";
    }

    #endregion

}


?>