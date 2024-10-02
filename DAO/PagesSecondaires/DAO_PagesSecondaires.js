import { I_DAO_PagesSecondaires } from "./I_DAO_PagesSecondaires.js";
import { Methodes } from "../../DAO/Methodes.js";

/**
 * Classe permettant d'accéder aux pages secondaires de l'application (à propos, confidentialité,...)
 */
export class DAO_PagesSecondaires extends I_DAO_PagesSecondaires {

    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    Accueil() {
        Methodes.Fetch("../PHP/CreationPages/GenerationAccueil.php").then(() => {
            Methodes.ChargerScriptJS("../metier/Accueil.js");
            Methodes.ChargerScriptJS("../metier/HeaderFooter.js");
        });
    }

    APropos() {
        Methodes.Fetch("../PHP/CreationPages/PagesSecondaires/GenerationAPropos.php").then(() => {
            Methodes.ChargerScriptJS("../metier/HeaderFooter.js");
        });
    }

    Conditions(){
        Methodes.Fetch("../PHP/CreationPages/PagesSecondaires/GenerationConditions.php").then(() => {
            Methodes.ChargerScriptJS("../metier/HeaderFooter.js");
        });
    }

    Confidentialite(){
        Methodes.Fetch("../PHP/CreationPages/PagesSecondaires/GenerationConfidentialite.php").then(() => {
            Methodes.ChargerScriptJS("../metier/HeaderFooter.js");
        });
    }

}