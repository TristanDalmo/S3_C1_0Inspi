class DAO_Connexion_Exemple extends I_DAO_Connexion {

    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    Connexion(username , password ) {
        window.location.replace("SiteWeb/menu.html");
    }
        
}