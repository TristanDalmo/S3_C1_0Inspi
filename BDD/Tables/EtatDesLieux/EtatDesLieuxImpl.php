<?php

require_once("I_BDD.php"); 

class EtatDesLieuxImpl implements I_BDD{
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
        echo "\n";
    }

    public static function Stmt($sql,$etatDesLieux){
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $etatDesLieux->getIdEtatDesLieux(), SQLITE3_INTEGER);
        $stmt->bindValue(':dateEntree', $etatDesLieux->getDateEntree()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':dateSortie', $etatDesLieux->getDateSortie()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':type', $etatDesLieux->getType(), SQLITE3_TEXT);
        $stmt->bindValue(':media', $etatDesLieux->getMedia(), SQLITE3_TEXT);

        $result = $stmt->execute();
        return $result;
    }

    public static function insertTable($etatDesLieux) {
        $sql = "INSERT INTO EtatDesLieux (dateEntree, dateSortie, type, media) VALUES (:dateEntree, :dateSortie, :type, :media)";
        $result=EtatDesLieuxImpl::Stmt( $sql,$etatDesLieux );
        if ($result) {
            echo "Insertion réussie ! ID de la nouvelle ligne : " . self::$db->lastInsertRowID() . "\n";
        } else {
            echo "Erreur lors de l'insertion : " . self::$db->lastErrorMsg() . "\n";
        }
        echo "\n";
    }

    public static function updateTable($etatDesLieux) {
        $sql = "UPDATE EtatDesLieux SET dateEntree = :dateEntree, dateSortie = :dateSortie, type = :type, media = :media WHERE idEtatDesLieux = :id";
        $result=EtatDesLieuxImpl::Stmt( $sql,$etatDesLieux );
        if ($result) {
            echo "Mise à jour réussie ! Nombre de lignes affectées : " . self::$db->changes() . "\n";
        } else {
            echo "Erreur lors de la mise à jour : " . self::$db->lastErrorMsg() . "\n";
        }
        echo "\n";
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
        echo "\n";
    }

    /**
     * Ferme la connexion à la base de données.
     */
    public static function closeConnection() {
        if (self::$db) {
            self::$db->close();
            echo "Connexion à la base de données fermée.\n";
        }
        echo "\n";
    }
}

?>