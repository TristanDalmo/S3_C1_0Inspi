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
        parent::__construct(cssChemin: "../SiteWeb/formulaire.css",nom:"E-Lieu ~ Formulaire");
    }

    protected function GenerateContent() : string
    {
        return "    <div class=\"formulaire\">
        <form>
            <fieldset class=\"grandfield\">
                <div class=\"Containerhaut\">
                    <div class=\"texte-gauche\">
                        <p class=\"Gras\">ÉTAT DES LIEUX</p>
                        <p id=\"petit\">(Conforme LOI ALUR)</p>
                    </div>
                    <div class=\"date-droite\">
                        <label for=\"fDate\" class=\"putbold\">DATE D'ENTRÉE :</label>
                        <input type=\"date\" id=\"fDate\" name=\"fDate\" required>
                    </div>
                </div>
                <div class=\"ligne2\">
                    <div class=\"texte-gauche1\">
                        <input type=\"radio\" id=\"ENTREE\" name=\"fPermis\" value=\"Entrée\">
                        <label for=\"ENTREE\">Entrée</label>
                        <input type=\"radio\" id=\"SORTIE\" name=\"fPermis\" value=\"Sortie\">
                        <label for=\"SORTIE\">Sortie</label>
                    </div>
                    <div class=\"date-droite1\">
                        <label for=\"fDateS\" class=\"putbold\">DATE DE SORTIE :</label>
                        <input type=\"date\" id=\"fDateS\" name=\"fDateS\" required>
                    </div>
                </div>
                <br>
                <div class=\"loi\">
                    <p>L'état des lieux doit être établi entre les deux parties (locataire et propriétaire) lors de la remise des clés du logement et lors de leur restitution. En effet, le bail (loi n° 89-462 du 6 juillet 1989) stipule que l'état des lieux doit porter sur l'ensemble des locaux et équipements d'usage privatif mentionnés au contrat de location, et dont le locataire a la jouissance exclusive.</p>
                </div>
                <br>

                <fieldset class=\"Logement\">
                    <div class=\"l1\">
                        <p class=\"putbold\">LOGEMENT</p>
                    </div>
                    <div class=\"l2\">
                        <input type=\"radio\" id=\"Appartement\" name=\"typeLogement\">
                        <label for=\"Appartement\">Appartement</label>
                        <input type=\"radio\" id=\"Maison\" name=\"typeLogement\">
                        <label for=\"Maison\">Maison</label>
                        <input type=\"radio\" id=\"Autre\" name=\"typeLogement\">
                        <label for=\"Autre\">Autre</label>
                        <input type=\"text\" id=\"textautre\" size=\"5\">
                    </div>
                    <div class=\"l3\">
                        <label for=\"SURFACE\" class=\"putbold\">SURFACE :</label>
                        <input type=\"text\" id=\"SURFACE\" placeholder=\"m²\">
                        <label for=\"nbpiece\" class=\"putbold\">NOMBRE DE PIÈCES PRINCIPALES :</label>
                        <input type=\"number\" id=\"nbpiece\">
                    </div>
                    <div class=\"l4\">
                        <label for=\"adresse\" class=\"putbold\">ADRESSE :</label>
                        <textarea id=\"adresse\" rows=\"3\" cols=\"50\"></textarea>
                    </div>
                </fieldset>

                <fieldset>
                <table>
                    <tr>
                        <th id=\"tab1\" class=\"putbold\">LE BAILLEUR (OU SON MANDATAIRE)</th>
                        <th id=\"tab2\" class=\"putbold\">LE(S) LOCATAIRE(S)</th>
                    </tr>
                    <tr>
                        <td>
                            <div class=\"civilite-container\">
                                <label for=\"civilite_bailleur\" class=\"putbold\">CIVILITÉ :</label>
                                <span class=\"civilite\">
                                    <input type=\"radio\" id=\"mr_bailleur\" name=\"civilite_bailleur\">
                                    <label for=\"mr_bailleur\">Mr</label>
                                    <input type=\"radio\" id=\"mme_bailleur\" name=\"civilite_bailleur\">
                                    <label for=\"mme_bailleur\">Mme</label>
                                    <input type=\"radio\" id=\"mlle_bailleur\" name=\"civilite_bailleur\">
                                    <label for=\"mlle_bailleur\">Mlle</label>
                                </span>
                            </div>
                            <label for=\"prenom_bailleur\" class=\"putbold\" >PRÉNOM :</label>
                            <input type=\"text\" id=\"prenom_bailleur\">
                            <label for=\"nom_bailleur\" class=\"putbold\">NOM :</label>
                            <input type=\"text\" id=\"nom_bailleur\">
                            <label for=\"adresse_bailleur\" class=\"putbold\">ADRESSE :</label>
                            <textarea id=\"adresse_bailleur\" rows=\"3\"></textarea>
                        </td>
                        <td>
                            <div class=\"civilite-container\">
                                <label for=\"civilite_locataire\" class=\"putbold\">CIVILITÉ :</label>
                                <span class=\"civilite\">
                                    <input type=\"radio\" id=\"mr_locataire\" name=\"civilite_locataire\">
                                    <label for=\"mr_locataire\">Mr</label>
                                    <input type=\"radio\" id=\"mme_locataire\" name=\"civilite_locataire\">
                                    <label for=\"mme_locataire\">Mme</label>
                                    <input type=\"radio\" id=\"mlle_locataire\" name=\"civilite_locataire\">
                                    <label for=\"mlle_locataire\">Mlle</label>
                                </span>
                            </div>
                            <label for=\"prenom_locataire\" class=\"putbold\">PRÉNOM :</label>
                            <input type=\"text\" id=\"prenom_locataire\">
                            <label for=\"nom_locataire\" class=\"putbold\">NOM :</label>
                            <input type=\"text\" id=\"nom_locataire\">
                            <label for=\"adresse_locataire\" class=\"putbold\">ADRESSE :</label>
                            <p class=\"petit\">(Si état des lieux de sortie, mentionner la nouvelle adresse de domiciliation)</p>
                            <textarea id=\"adresse_locataire\" rows=\"3\"></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>

            <table id=\"Cuisine\"> 
                <tr>
                    <th>Cuisine</th>
                    <th>Description / détails</th>
                    <th> État </br>(entrée)</th>
                    <th> État </br>(sortie)</th>
                </tr>"
                + AjouterLigneTabCuisine("Mur","Mur")
                + AjouterLigneTabCuisine("Sol","Sol")
                + AjouterLigneTabCuisine("Vitrage et volets","VitrageVolets")
                + AjouterLigneTabCuisine("Plafond","Plafond")
                + AjouterLigneTabCuisine("Éclairage et interrupteurs","Eclairage")
                + AjouterLigneTabCuisine("Prise électrique ( nombre : <input type=\"number\" id=\"NbrPrises\"> ) ","Prises")
                + AjouterLigneTabCuisine("Placards et tiroirs","PlacardsTiroirs")
                + AjouterLigneTabCuisine("Évier (et robinetterie)","Evier")
                + AjouterLigneTabCuisine("Plaques de cuisson et four","Four")
                + AjouterLigneTabCuisine("Hotte","Hotte")
                + AjouterLigneTabCuisine("Électroménager : <input type=\"number\" id=\"NbrElectromenager\">","Electromenager")
                +"

            </table>






            </fieldset>

        </form>
    </div>";
    }

    /**
     * Méthode permettant de générer une ligne du tableau de la cuisine
     * @param string $nom Nom à insérer dans la colonne de gauche
     * @param string $idNom Id à insérer
     * @return string Ligne ajoutée
     */
    public function AjouterLigneTabCuisine(string $nom,string $idNom) : string 
    {
        return "
        <tr>
            <td>" + $nom + "</td>
            <td> <textarea name=\"DescriptionCuisine\""+$idNom + "id=\"DescriptionCuisine\""+$idNom + "> </td>
            <td> <input type=\"text\" id=\"EtatEntreeCuisine" +  $idNom + "\"> </td>
            <td> <input type=\"text\" id=\"EtatSortieCuisine" +  $idNom + "\"> </td>
        </tr>     
                            
        
        ";




    }




}

$instance = new GenerationFormulaire();

echo $instance->GeneratePage();

?>