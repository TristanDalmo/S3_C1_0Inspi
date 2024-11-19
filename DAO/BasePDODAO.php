<?php

namespace DAO;
use PDO;
use PDOException;
use PDOStatement;
require_once(__DIR__ . "/../Config/Config.php");
use Config;

/**
 * Classe de base d'un DAO
 */
class BasePDODAO {

    private PDO $db;

    public function __construct() {
        $this->db = $this->getDB();
    }

    /**
     * Méthode permettant d'exécuter la requête SQL passée en paramètre, préparée avec des paramètres passés dans un tableau
     * @param string $sql Requête SQL à préparer et exécuter
     * @param array $params Paramètres de la requête SQL
     * @return PDOStatement|false
     */
    protected function execRequest(string $sql, array $params = null) : PDOStatement|false {
        
        // Initialisation de la variable de retour
        $retour = null;

        // On prépare la requête
        $stmt = $this->db->prepare($sql);

        try {
            // Si on a des paramètres, on les utilisera
            if ($params != null) {
                // On ajoute les différents attributs
                foreach ($params as $key => $value) {
                    $stmt->bindValue($key, $value);
                }
            }

            // On exécute la requête SQL
            $stmt->execute();

            $retour = $stmt;
        }
        catch (PDOException $e) {
            // Gérer les erreurs de BDD
            $retour = "Erreur : " . $e->getMessage();
        }

        
        return $stmt;
    }

    /**
     * Méthode créant un PDO à partir de celui stocké dans la classe actuelle
     * @return PDO PDO créé
     */
    private function getDB() : PDO {

        $dsn = Config\Config::get('dsn');
        $username = Config\Config::get('username');
        $password = Config\Config::get('password');

        return new PDO(dsn: $dsn, username: $username, password: $password);
    }

    /**
     * Méthode permettant de vérifier les résultats de la BDD selon le résultat renvoyé
     * @param mixed $result Résultat à vérifier
     * @param string $MessageSucces Message à retourner en cas de succès
     * @param string $MessageAucunChangement Message à retourner dans le cas où il n'y a aucun changement
     * @param string $MessageErreur Message à retourner en cas d'erreur
     * @return string Message à retourner
     */
    protected function verificationResultat($result, string $MessageSucces, string $MessageAucunChangement, string $MessageErreur) : string 
    {
        // Message de retour
        $retour = null;

        if ($result instanceof PDOStatement) {
            $rowCount = $result->rowCount();
            if ($rowCount > 0) {
                $retour =  $MessageSucces;
            } else {
                $retour =  $MessageAucunChangement;
            }
        } else {
            $retour =  $MessageErreur;
        }

        // Retour du message
        return $retour;
    }

    
}












?>