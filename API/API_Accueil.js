import {DAO_Accueil} from '../DAO/DAO_Accueil.js';
import {I_API_Accueil} from '../API/I_API_Accueil.js';
 
/**
 * Classe d'une API pour accéder au différente page depuis la page d'accueil 
 */
export class API_Accueil extends I_API_Accueil {

    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appelle le constructeur de la classe parente
    }

    Formulaire() {
        (new DAO_Accueil()).Formulaire();
    }

    TableauDeBord() {
        (new DAO_Accueil()).TableauDeBord();
    }

    Gestionnaire() {
        (new DAO_Accueil()).Gestionnaire();
    }
    
}