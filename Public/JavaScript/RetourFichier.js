async function gererErreurs()
{
    console.log("oui");
    try {
        const reponse = await fetch('../../PagesFormulaires/Controller.php');

        if (!reponse.ok)
        {
            throw new Error(`Erreur HTPP: ${reponse.status}`);
        }

        const data = await reponse.json();

        if (data)
        {
            if (data.message)
            {
            alert(data.message);
            }
        }
        else
        {
            console.log("Pas de message reçu");
        }
    }
    catch(error)
    {
        console.error('Erreur:',error);
    }
    

}

window.onload=gererErreurs;