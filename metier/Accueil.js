import { API_Accueil } from '../API/API_Accueil.js';

function main()
{
    let bouttonForm = document.getElementById("CreerFormulaire");
    bouttonForm.onclick=Formulaire;

    let boutonGestionnaire = document.getElementById("Gestionnaire");
    boutonGestionnaire.onclick=Gestionnaire;

    let boutonTableau = document.getElementById("TableauDeBord");
    boutonTableau.onclick=TableauDeBord;
}
window.onload=main;

async function Formulaire() {
    try {
        (new API_Accueil()).Formulaire();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
    
}

async function Gestionnaire() {
    try {
        (new API_Accueil()).Gestionnaire();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
    
}

async function TableauDeBord() {
    try {
        (new API_Accueil()).TableauDeBord();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
    
}