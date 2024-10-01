/**
 * Classe abstraite d'une DAO de connexion à la Base de Données
 */
export class I_DAO_Connexion {

    /**
     * Constructeur de la classe
     */
    constructor() {
        if (this.constructor === I_DAO_Connexion) {
            throw new TypeError("On ne peut pas instancier une classe abstraite");
        }
    }

    /**
     * Permet de se connecter à un profil sur l'application
     * @param {String} username Nom d'utilisateur
     * @param {String} password Mot de passe
     */
    Connexion(username , password ) {
        throw new Error("La méthode \"Connexion()\" doit être implémentée");
    }
    
}