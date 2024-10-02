/**
 * Classe abstraite d'une DAO correspondant aux pages accessibles depuis le Header et le Footer
 */
export class I_DAO_PagesSecondaires {

    /**
     * Constructeur de la classe
     */
    constructor() {
        if (this.constructor === I_DAO_PagesSecondaires) {
            throw new TypeError("On ne peut pas instancier une classe abstraite");
        }
    }

    /**
     * Permet d'accéder à la page d'accueil de l'application
     */
    Accueil() {
        throw new Error("La méthode \"Accueil()\" doit être implémentée");
    }

    /**
     * Permet d'accéder à la page "À propos" de l'application
     */
    APropos() {
        throw new Error("La méthode \"APropos()\" doit être implémentée");
    }

    /**
     * Permet d'accéder à la page "Conditions d'utilisation" de l'application
     */
    Conditions(){
        throw new Error("La méthode \"Conditions()\" doit être implémentée");
    }

    /**
     * Permet d'accéder à la page "Confidentialité" de l'application
     */
    Confidentialite(){
        throw new Error("La méthode \"Confidentialite()\" doit être implémentée");
    }
    
}