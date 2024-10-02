
/**
 * Classe renvoyant les méthodes communes aux différentes classes de la DAO
 */
export class Methodes {

    /**
     * Méthodes permettant, à partir d'un lien, de remplacer le
     * contenu d'un site web par un autre, à partir d'un lien donné
     * @param {String} lien 
     */
    static Fetch(lien) {
        return new Promise((resolve,reject) => {
            fetch(lien, {
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
                document.body.innerHTML = html;
                //document.replaceChild(nouveauDocument.documentElement,document.documentElement);
                
                // On résout la promesse
                resolve();
           
            })
            .catch(error => {
                reject('Erreur : ', error);
            })  
        })      
    }

    /**
     * Méthode permettant de charger un script JS dans le site web, à partir d'un lien donné
     * @param {String} lien 
     */
    static ChargerScriptJS(lien) {
        let script = document.createElement('script');
        script.src = lien;
        script.type = 'module';
        document.head.appendChild(script);
    }


} 