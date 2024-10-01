import {DAO_Acceuil} from '../DAO/DAO_Acceuil.js';
import {I_API_Acceuil} from '../API/I_API_Acceuil.js';
 
/**
 * Classe d'une API pour accéder au différente page depuis la page d'accueil 
 */
export class API_Connexion_Exemple extends I_API_Acceuil {

    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appelle le constructeur de la classe parente
    }

    Formulaire() {
        (new DAO_Acceuil()).Formulaire();
    }

    TableauDeBord() {
        (new DAO_Acceuil()).TableauDeBord();
    }
    
}