import {DAO_Connexion_Exemple} from '/DAO/DAO_Connexion_Exemple.js';

/**
 * Classe d'API permettant la connexion à une BDD
 */
class API_Connexion_Exemple extends I_API_Connexion {

    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appelle le constructeur de la classe parente
    }

    Connexion(username , password ) {
        DAO_Connexion_Exemple.Connexion(username,password);
    }
    
}