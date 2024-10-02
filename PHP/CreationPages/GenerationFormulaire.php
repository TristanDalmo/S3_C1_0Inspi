<?php

require_once("AbstractGenerationPage.php");

/**
 * Classe de génération de la page d'accueil de l'application
 */
class GenerationFormulaire extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/formulaire.css");
    }

    protected function GenerateContent() : string
    {
        return "    <div class=\"formulaire\">
        <form>    
            <fieldset>
                <div class=\"Containerhaut\">
                    <div class=\"texte-gauche\">
                        <p class=\"Gras\">ÉTAT DES LIEUX</p>
                        <p id=\"petit\">(Conforme LOI ALUR)</p>
                    </div>
                    <div class=\"date-droite\">
                        <label for=\"fDate\">DATE D'ENTRÉE : </label>
                        <input type=\"date\" id=\"fDate\" name=\"fDate\" required>
                    </div>
                </div>
                <div class=\"ligne2\">
                    <div class=\"texte-gauche1\">
                    <input type=\"radio\" id=\"ENTREE\" name=\"fPermis\" value=\"Oui\">
                    <label for=\"ENTREE\">Entrée</label>
                    <input type=\"radio\" id=\"SORTIE\" name=\"fPermis\" value=\"Oui\">
                    <label for=\"SORTIE\">Sortie</label>
                    </div>
                    <div class=\"date-droite1\">
                        <label for=\"fDateS\">DATE DE SORTIE : </label>
                        <input type=\"date\" id=\"fDatS\" name=\"fDate\" required>
                    </div>
                </div><br>
                <div class=\"loi\">
                <p>L'état des lieux doit être établi entre les deux parties (locataire et propriétaire) lors de la remise des clés du logement et lors de leur restitution.
                    En effet, le bail (loi n° 89-462 du 6 juillet 1989) stipule que l'état des lieux doit porter sur l'ensemble des locaux et équipements d'usage privatif mentionnés au contrat de location, et dont le locataire a la jouissance exclusive.</p>
                </div><br>
                
        </form>
    </div>";
    }

}

$instance = new GenerationFormulaire();

echo $instance->GeneratePage();

?>