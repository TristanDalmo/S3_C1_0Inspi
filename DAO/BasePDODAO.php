<?php

namespace Models;
use PDO;
use PDOStatement;
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
        
        // On prépare la requête
        $stmt = $this->db->prepare($sql);

        // Si on a des paramètres, on les utilisera
        if ($params != null) {
            // On ajoute les différents attributs
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }


        // On exécute la requête SQL
        $stmt->execute();
        
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

    
}












?>