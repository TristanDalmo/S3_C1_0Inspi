import {API_Connexion_Exemple} from '../API/API_Connexion_Exemple.js';

function main()
{
    let button = document.getElementById("BoutonCreationEtat");
    button.onclick=LancementPageFormulaire;
}
window.onload=main;

function LancementPageFormulaire()
{
    Formulaire();
}

async function Formulaire(username , password ) {
    try {
        (new API_Connexion_Exemple()).Formulaire(username,password);
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
    
}