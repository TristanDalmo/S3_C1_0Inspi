
/**
 * Classe renvoyant les méthodes communes aux différentes classes de la DAO
 */
export class Methodes {

    /**
     * Méthodes permettant, à partir d'un lien, de remplacer le
     * contenu d'un site web par un autre, à partir d'un lien donné
     * @param {String} lien 
     */
    static async Fetch(lien) {

        // On crée la demande de fetch
        fetch(lien, {
           method: 'GET',
            headers : {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        })
        // Ensuite, on vérifie si la réponse est bien donnée
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
        // On remplace ensuite le contenu de la page actuelle par un nouveau contenu html
        .then(html =>{
            // Création d'un document à partir du HTML reçu
            let parser = new DOMParser();
            let nouveauDocument = parser.parseFromString(html, 'text/html');

            // On remplace l'élément à la racine du document
            //document.body.innerHTML = html;
            document.replaceChild(nouveauDocument.documentElement,document.documentElement);
            
        })
        .catch(error => {
            console.log('Erreur : ', error);
        })  
    }

    /**
     * Méthode permettant de charger un script JS dans le site web, à partir d'un lien donné
     * @param {String} lien 
     */
    static async ChargerScriptJS(lien) {
                let script = document.createElement('script');
                script.src = lien;
                script.type = 'module';
                document.head.appendChild(script);
        }
        
    


}


