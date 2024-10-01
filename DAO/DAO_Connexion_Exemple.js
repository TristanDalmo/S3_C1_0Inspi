import {I_DAO_Connexion} from '../DAO/I_DAO_Connexion.js';

/**
 * Classe d'exemple de connexion à la DAO 
 */
class DAO_Connexion_Exemple extends I_DAO_Connexion {
  
    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    Connexion(username , password ) {
        fetch('/PHP/CreationPages/GenerationAccueil.php', {
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
        })
        .then(html => {
            document.body.innerHTML = html;
        })
        .catch(error => {
            console.error('Erreur : ', error);
        })

    }
        
}