/**
 * Classe d'exemple de connexion à la DAO 
 */
class DAO_Connexion_Exemple extends I_DAO_Connexion {
  
    /**
     * Constructeur de la classe
     */
    constructor() {
        super(); // Appel constructeur de la classe parente
    }

    Connexion(username , password ) {
        window.location.replace("SiteWeb/menu.html");
    }
        
}