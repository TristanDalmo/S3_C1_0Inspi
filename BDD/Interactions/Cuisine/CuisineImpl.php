<?php

require_once("I_BDD.php");

class CuisineImpl implements I_BDD {
    private static $db;

    /**
     * Initialise la connexion à la base de données.
     */
    public static function init() {
        self::$db = new SQLite3('../baseDeDonnees.db');
        if (!self::$db) {
            echo self::$db->lastErrorMsg();
        } else {
            echo "Connecté à la base de données SQLite.";
        }
        echo "<br>";
    }

    public static function Stmt($sql, $cuisine) {
        self::$db->exec('BEGIN TRANSACTION');
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':idCuisine', $cuisine->getIdCuisine(), SQLITE3_INTEGER);
        $stmt->bindValue(':idElectromenager', $cuisine->getIdElectromenager(), SQLITE3_INTEGER);
        $stmt->bindValue(':idPriseCuisine', $cuisine->getIdPriseCuisine(), SQLITE3_INTEGER);
        $result = $stmt->execute();
        self::$db->exec('COMMIT');
        return $result;
    }

    public static function insertTable($cuisine) {
        $sql = "INSERT INTO T_Cuisine (idElectromenager, idPriseCuisine) VALUES (:idElectromenager, :idPriseCuisine)";
        $result = CuisineImpl::Stmt($sql, $cuisine);
        if ($result) {
            echo "Insertion réussie ! ID de la nouvelle ligne : " . self::$db->lastInsertRowID();
        } else {
            echo "Erreur lors de l'insertion : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    public static function updateTable($cuisine) {
        $sql = "UPDATE T_Cuisine SET idElectromenager = :idElectromenager, idPriseCuisine = :idPriseCuisine WHERE idCuisine = :idCuisine";
        $result = CuisineImpl::Stmt($sql, $cuisine);
        if ($result) {
            echo "Mise à jour réussie ! Nombre de lignes affectées : " . self::$db->changes();
        } else {
            echo "Erreur lors de la mise à jour : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    public static function afficherContenuTable($tableName) {
        $sql = "SELECT * FROM " . SQLite3::escapeString($tableName);
        $result = self::$db->query($sql);

        if ($result) {
            echo "Contenu de la table $tableName:\n";
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                print_r($row);
                echo "<br>";
            }
        } else {
            echo "Erreur lors de la récupération du contenu de la table $tableName: " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    /**
     * Ferme la connexion à la base de données.
     */
    public static function closeConnection() {
        if (self::$db) {
            self::$db->close();
            echo "Connexion à la base de données fermée";
        }
        echo "<br>";
    }
}

?>