/**
 * Classe abstraite d'une API pour accéder au différente page depuis la page d'accueil 
 */
export class I_API_Accueil {

    /**
     * Constructeur de la classe abstraite
     */
    constructor() {
        if (this.constructor === I_API_Connexion) {
            throw new TypeError("On ne peut pas instancier une classe abstraite");
        }
    }

    /**
     * Permet d'accéder au formulaire sur l'application
     */
    Formulaire() {
        throw new Error("La méthode \"Formulaire()\" doit être implémentée");
    }

    /**
     * Permet d'accéder au tableau de bord de l'application
     */
    TableauDeBord(){
        throw new Error("La méthode \"TableauDeBord()\" doit être implémentée");
    }

    /**
     * Permet d'accéder au gestionnaire d'états des lieux de l'application
     */
    Gestionnaire(){
        throw new Error("La méthode \"Gestionnaire()\" doit être implémentée");
    }

}