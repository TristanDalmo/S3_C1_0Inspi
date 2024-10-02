import { I_DAO_Accueil } from "../DAO/I_DAO_Accueil.js";
import { Methodes } from "../DAO/Methodes.js";

/**
 * Classe d'exemple de connexion à la DAO 
 */
export class DAO_Accueil extends I_DAO_Accueil {

    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    Gestionnaire() {
        Methodes.Fetch("../PHP/CreationPages/GenerationGestionnaire.php");
    }


    TableauDeBord() {
        Methodes.Fetch("../PHP/CreationPages/GenerationTableauDeBord.php");
    }

    Formulaire() {
        Methodes.Fetch('../PHP/CreationPages/GenerationFormulaire.php');
    }

}