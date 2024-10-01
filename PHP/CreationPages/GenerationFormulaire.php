<?php
    require_once("GenerationPage.php");
    
    /**
     * Classe de génération de la page de la création des formulaires de l'application
     */
    class GenerationAccueil extends GenerationFormulaire
    {
        public function __construct()
        {
            // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
            parent::__construct(cssChemin: "../SiteWeb/menu.css",jsChemin: "../metier/Accueil.js");
        }
        
        protected GenerateContent() : string
        {
            echo "bienvenue sur le formulaire";
        }
    }

?>