<?php

namespace Config;
use Exception;

/**
 * Classe permettant une connexion à la BDD à partir d'un profil donné (temporaire pour les tests)
 */
class Config {

    private static bool $modeTestUnitaires = false;

    /**
     * Get the value of modeTestUnitaires
     */ 
    public static function getModeTestUnitaires()
    {
        return self::$modeTestUnitaires;
    }

    /**
     * Set the value of modeTestUnitaires
     * @param bool $modeTestUnitaires
     * @return void
     */
    public static function setModeTestUnitaires(bool $modeTestUnitaires)
    {
        self::$modeTestUnitaires = $modeTestUnitaires;
    }
    

    private static $param;

    /**
     * Méthode renvoyant la valeur d'un paramètre de configuration
     * @param mixed $nom Nom du paramètre
     * @param mixed $valeurParDefaut Valeur par défaut du paramètre
     * @return mixed La valeur du paramètre
     */
    public static function get($nom, $valeurParDefaut = null) {
        if (isset(self::getParameter()[$nom])) {
            $valeur = self::getParameter()[$nom];
        }
        else {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    /**
     * Charge les différents paramètres de la connexion
     * @throws \Exception
     * @return mixed Paramètres de connexion
     */
    private static function getParameter() {

        if (self::$param == null) {

            if (Config::$modeTestUnitaires)
            {
                $cheminFichier = "TestBDD/dev.ini";
            }
            else {
                if (file_exists("../../Config/prod.ini")) {
                    $cheminFichier = "../../Config/prod.ini";
                }
                if (file_exists("../../Config/dev.ini")) {
                        $cheminFichier = "../../Config/dev.ini";
                }
            } 

            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            
            self::$param = parse_ini_file($cheminFichier);
            
        }        

        return self::$param;
    }


}

?>