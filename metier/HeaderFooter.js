import { API_PagesSecondaires } from '../API/PagesSecondaires/API_PagesSecondaires.js';

function main()
{
    console.log("JavaScript du Header et du Footer généré.");

    //let boutonAccueil = document.getElementById("Accueil");
    //boutonAccueil.onclick = Accueil;

    let boutonAPropos = document.getElementById("APropos");
    boutonAPropos.onclick=APropos;

    let boutonConfidentialite = document.getElementById("Confidentialite");
    boutonConfidentialite.onclick=Confidentialite;

    let boutonConditions = document.getElementById("Conditions");
    boutonConditions.onclick=Conditions;
}
main();

async function Accueil() {
    try {
        (new API_PagesSecondaires()).Accueil();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
}

async function APropos() {
    try {
        (new API_PagesSecondaires()).APropos();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
}

async function Confidentialite() {
    try {
        (new API_PagesSecondaires()).Confidentialite();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
}

async function Conditions() {
    try {
        (new API_PagesSecondaires()).Conditions();
    }
    catch (error) {
        console.error("Erreur : ", error);
    }
}
