/**
 * Classe abstraite d'une DAO de la page d'acceuil
 */
export class I_DAO_Acceuil {

    /**
     * Constructeur de la classe
     */
    constructor() {
        if (this.constructor === I_DAO_Acceuil) {
            throw new TypeError("On ne peut pas instancier une classe abstraite");
        }
    }

    /**
     * Permet d'accéder au tableau de bord
     * 
     */
    TableauDeBord() {
        throw new Error("La méthode \"TableauDeBord()\" doit être implémentée");
    }

    /**
     * Permet d'accéder au formulaire
     */
    Formulaire(){
        throw new Error("La méthode \"Formulaire()\" doit être implémentée");
    }
    
}