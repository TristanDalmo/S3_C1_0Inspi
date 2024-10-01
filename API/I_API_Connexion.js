/**
 * Classe abstraite d'une API de connexion à la Base de Données
 */
class I_API_Connexion {

    /**
     * Constructeur de la classe abstraite
     */
    constructor() {
        if (this.constructor === I_API_Connexion) {
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