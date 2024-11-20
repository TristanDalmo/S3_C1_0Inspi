<?php

namespace DAO;
use PDO;
use PDOException;
use PDOStatement;
require_once(__DIR__ . "/../Config/Config.php");
use Config;
use Exception;

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

        $dbPath = Config\Config::get('sqlite_path');

        return new PDO("sqlite:" . $dbPath);

        /*

        $dsn = Config\Config::get('dsn');
        $username = Config\Config::get('username');
        $password = Config\Config::get('password');

        return new PDO(dsn: $dsn, username: $username, password: $password);

        */
    }

    /**
     * Méthode permettant de vérifier les résultats de la BDD selon le résultat renvoyé
     * @param mixed $result Résultat à vérifier
     * @param string $MessageSucces Message à retourner en cas de succès
     * @param string $MessageAucunChangement Message à retourner dans le cas où il n'y a aucun changement
     * @param string $MessageErreur Message à retourner en cas d'erreur
     */
    protected function verificationResultat($result, string $MessageSucces, string $MessageAucunChangement, string $MessageErreur, bool $isUpdate = false) : void 
    {
        // Message de retour
        $retour = null;

        if (!$isUpdate)
        {
            if ($result instanceof PDOStatement) {
                $rowCount = $result->rowCount();
                if ($rowCount > 0) {
                    $retour =  $MessageSucces;
                } else {
                    $retour =  $MessageAucunChangement;
                    throw new Exception($retour);
                }
            } else {
                $retour =  $MessageErreur;
                throw new Exception($retour);
            }
        }
        else 
        {
            if ($result instanceof PDOStatement) {
                // Sélection des changements dans la BDD
                $changesCount = $this->db->query('SELECT changes()')->fetchColumn();
                
                if ($changesCount > 0) {
                    $retour = $MessageSucces;
                } else {
                    // Vérification que l'opération s'est finie sans erreur
                    $errorInfo = $this->db->errorInfo();
                    if ($errorInfo[0] === '00000') {
                        // Pas d'erreur, mais pas de changement
                        $retour = $MessageAucunChangement;
                    } else {
                        // Une erreur s'est produite
                        $retour = $MessageErreur . " : " . $errorInfo[2];
                        throw new Exception($retour);
                    }
                }
            } else {
                $retour = $MessageErreur;
                throw new Exception($retour);
            }
        }



        // Retour du message en console
        echo "<script>console.log(" . json_encode($retour) . ");</script>";
    }

    /**
     * Méthode retournant l'id du dernier élément inserré dans la BDD
     * @return int Id du dernier élément inserré dans la BDD
     */
    protected function getlastInsertId() : int {
        return $this->db->lastInsertId();
    }

    
}












?>