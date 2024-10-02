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

        try {
            // On lance la requête de fetch
            const reponse = await Methodes.Fetch('../PHP/CreationPages/GenerationAccueil.php');

            // On vérifie si la réponse est positive ou non
            if (!reponse.ok) {
                throw new Error("Pas de fetch")
            }
            // Si oui, on lance le chargement des fichiers Javascript liés à la page html
            else 
            {
                await Methodes.ChargerScriptJS("../metier/Accueil.js");
                await Methodes.ChargerScriptJS("../metier/HeaderFooter.js");
            }
        }
        catch (error) {
                console.error("Le fetch a échoué");
            }
        
        

        

    }
        
}