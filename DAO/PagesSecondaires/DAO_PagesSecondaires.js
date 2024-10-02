import { I_DAO_PagesSecondaires } from "../../DAO/PagesSecondaires/I_DAO_PagesSecondaires.js";
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
        });
    }

    APropos() {
        Methodes.Fetch("../../PHP/PagesSecondaire/GenerationAPropos.php");
    }

    Conditions(){
        Methodes.Fetch("../../PHP/PagesSecondaire/GenerationConditions.php");
    }

    Confidentialite(){
        Methodes.Fetch("../../PHP/PagesSecondaire/GenerationConfidentialite.php");
    }

}