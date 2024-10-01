import {API_Connexion_Exemple} from '../API/API_Acceuil.js';
import { DAO_Accueil } from '../DAO/DAO_Acceuil.js';

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

async function Formulaire() {
    try {
        (new DAO_Accueil()).Formulaire();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
    
}