import {API_Connexion_Exemple} from '../API/API_Connexion_Exemple.js';

/**
 * Fonction appelée au chargement de la page
 */
function main() {
    // À la validation du formulaire, on lance la connexion si les champs ne sont pas vides
    let form = document.getElementById("formConnexion");
    form.onsubmit = validationSubmit;
}
window.onload = main;

/**
* Valide ou non le formulaire avant soumission
* @returns {boolean} true si le formulaire est valide
 */
function validationSubmit() {
    // On récupère les données du formulaire
    let username = document.getElementById("fUsername").value;
    let password = document.getElementById("fPassword").value;    

    Connexion(username,password);

    return false;
}

/**
 * Permet de se connecter à un profil sur l'application
 * @param {String} username Nom d'utilisateur
 * @param {String} password Mot de passe
 */
function Connexion(username , password ) {
    (new API_Connexion_Exemple()).Connexion(username,password);
}