import { I_DAO_Accueil } from "../DAO/I_DAO_Accueil.js";

/**
 * Classe d'exemple de connexion à la DAO 
 */
export class DAO_Accueil extends I_DAO_Accueil {
  
    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    Gestionnaire() {
        fetch('../PHP/CreationPages/GenerationGestionnaire.php', {
            method: 'GET',
            headers : {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau : ' + response.status);
            }
            else
            {
                console.log("Données reçues.");
            }
            return response.text();
        })
        .then(html =>{
            // Création d'un document à partir du HTML reçu
            let parser = new DOMParser();
            let nouveauDocument = parser.parseFromString(html, 'text/html');

            // On remplace l'élément à la racine du document
            document.replaceChild(nouveauDocument.documentElement,document.documentElement);
        })
        .catch(error => {
            console.error('Erreur : ', error);
        })
    }


    TableauDeBord() {
        fetch('../PHP/CreationPages/GenerationTableauDeBord.php', {
            method: 'GET',
            headers : {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau : ' + response.status);
            }
            else
            {
                console.log("Données reçues.");
            }
            return response.text();
        })
        .then(html =>{
            // Création d'un document à partir du HTML reçu
            let parser = new DOMParser();
            let nouveauDocument = parser.parseFromString(html, 'text/html');

            // On remplace l'élément à la racine du document
            document.replaceChild(nouveauDocument.documentElement,document.documentElement);
        })
        .catch(error => {
            console.error('Erreur : ', error);
        })

    }

    Formulaire() {
        fetch('../PHP/CreationPages/GenerationFormulaire.php', {
            method: 'GET',
            headers : {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau : ' + response.status);
            }
            else
            {
                console.log("Données reçues.");
            }
            return response.text();
        })
        .then(html =>{
            // Création d'un document à partir du HTML reçu
            let parser = new DOMParser();
            let nouveauDocument = parser.parseFromString(html, 'text/html');

            // On remplace l'élément à la racine du document
            document.replaceChild(nouveauDocument.documentElement,document.documentElement);
        })
        .catch(error => {
            console.error('Erreur : ', error);
        })

    }

}