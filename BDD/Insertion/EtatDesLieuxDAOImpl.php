<?php

class EtatDesLieuxDAOImpl implements I_BDD_DAO{
    private static $db;

    /**
     * Initialise la connexion à la base de données.
     */
    public static function init() {
        self::$db = new SQLite3('../baseDeDonnees.db');
        if (!self::$db) {
            echo self::$db->lastErrorMsg();
        } else {
            echo "Connecté à la base de données SQLite.\n";
        }
    }

    public static function insertTable($etatDesLieux) {
        $sql = "INSERT INTO EtatDesLieux (idEtatDesLieux, dateEntree, dateSortie, type, media) VALUES (:id, :dateEntree, :dateSortie, :type, :media)";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $etatDesLieux->getIdEtatDesLieux(), SQLITE3_INTEGER);
        $stmt->bindValue(':dateEntree', $etatDesLieux->getDateEntree()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':dateSortie', $etatDesLieux->getDateSortie()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':type', $etatDesLieux->getType(), SQLITE3_TEXT);
        $stmt->bindValue(':media', $etatDesLieux->getMedia(), SQLITE3_TEXT);

        $result = $stmt->execute();

        if ($result) {
            echo "Insertion réussie ! ID de la nouvelle ligne : " . self::$db->lastInsertRowID() . "\n";
        } else {
            echo "Erreur lors de l'insertion : " . self::$db->lastErrorMsg() . "\n";
        }
    }

    public static function afficherContenuTable($tableName) {
        $sql = "SELECT * FROM " . SQLite3::escapeString($tableName);
        $result = self::$db->query($sql);

        if ($result) {
            echo "Contenu de la table $tableName:\n";
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                print_r($row);
            }
        } else {
            echo "Erreur lors de la récupération du contenu de la table $tableName: " . self::$db->lastErrorMsg() . "\n";
        }
    }

    /**
     * Ferme la connexion à la base de données.
     */
    public static function closeConnection() {
        if (self::$db) {
            self::$db->close();
            echo "Connexion à la base de données fermée.\n";
        }
    }
}

?>