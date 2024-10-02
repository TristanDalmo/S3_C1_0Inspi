import {I_DAO_Connexion} from '../DAO/I_DAO_Connexion.js';
import { Methodes } from "../DAO/Methodes.js";

/**
 * Classe d'exemple de connexion à la DAO 
 */
export class DAO_Connexion_Exemple extends I_DAO_Connexion {
  
    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    async Connexion(username , password ) {
        Methodes.Fetch("../PHP/CreationPages/GenerationAccueil.php").then(() => {
            Methodes.ChargerScriptJS("../metier/Accueil.js");
            Methodes.ChargerScriptJS("../metier/page_connexion.js");
        });
        
    }
        
}