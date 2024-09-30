import {API_Connexion_Exemple} from '/API/API_Connexion_Exemple.js';

/**
 * Fonction appelée au chargement de la page
 */
function main() {
    let form = document.querySelector("form");
    form.onsubmit = validationSubmit;
}
window.onload = main;

/**
* Valide ou non le formulaire avant soumission
* @returns {boolean} true si le formulaire est valide
 */
function validationSubmit() {
    // On récupère les données du formulaire
    let username = new Date(document.getElementById("fUsername").value);
    let password = new Date(document.getElementById("fPassword").value);    

    Connexion(username,password);

}

/**
 * Permet de se connecter à un profil sur l'application
 * @param {String} username 
 * @param {String} password 
 */
function Connexion(username , password ) {
    API_Connexion_Exemple.Connexion(username,password);
}