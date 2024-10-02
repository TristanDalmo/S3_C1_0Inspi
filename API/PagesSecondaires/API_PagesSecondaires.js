import { I_API_PagesSecondaires } from "./I_API_PagesSecondaires";
import { DAO_PagesSecondaires } from "../../DAO/PagesSecondaires/DAO_PagesSecondaires";

/**
 * Classe d'une API affichant les pages secondaires du site web (à propos, confidentialité,...)
 */
export class API_PagesSecondaires extends I_API_PagesSecondaires {

    /**
     * Constructeur de la classe abstraite
     */
    constructor() {
        super(); // Appelle le constructeur de la classe parente
    }

    /**
     * Permet d'accéder à la page d'accueil de l'application
     */
    Accueil() {
        (new DAO_PagesSecondaires()).Accueil();
    }

    /**
     * Permet d'accéder à la page "À propos" de l'application
     */
    APropos() {
        (new DAO_PagesSecondaires()).APropos();
    }

    /**
     * Permet d'accéder à la page "Conditions d'utilisation" de l'application
     */
    Conditions(){
        (new DAO_PagesSecondaires()).Conditions();
    }

    /**
     * Permet d'accéder à la page "Confidentialité" de l'application
     */
    Confidentialite(){
        (new DAO_PagesSecondaires()).Confidentialite();
    }

}