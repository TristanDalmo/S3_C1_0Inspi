class I_API_Connexion {
    constructor() {
        if (this.constructor === I_API_Connexion) {
            throw new TypeError("On ne peut pas instancier une classe abstraite");
        }
    }

    /**
     * Permet de se connecter à un profil sur l'application
     * @param {String} username 
     * @param {String} password 
     */
    Connexion(username , password ) {
        throw new Error("La méthode \"Connexion()\" doit être implémentée");
    }

}