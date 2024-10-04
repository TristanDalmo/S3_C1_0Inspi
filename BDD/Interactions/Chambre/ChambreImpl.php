<?php

require_once("I_BDD.php");

class ChambreImpl implements I_BDD {
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

    /**
     * Prépare et exécute une requête SQL avec les données de la chambre.
     * @param string $sql La requête SQL à exécuter
     * @param Chambre $chambre L'objet Chambre contenant les données
     * @return SQLite3Result Le résultat de l'exécution de la requête
     */
    public static function Stmt($sql, $chambre) {
        self::$db->exec('BEGIN TRANSACTION');
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $chambre->getIdChambre(), SQLITE3_INTEGER);
        $stmt->bindValue(':idPriseChambre', $chambre->getIdPriseChambre(), SQLITE3_INTEGER);
        $result = $stmt->execute();
        self::$db->exec('COMMIT');
        return $result;
    }

    /**
     * Insère une nouvelle chambre dans la table.
     * @param Chambre $chambre L'objet Chambre à insérer
     */
    public static function insertTable($chambre) {
        $sql = "INSERT INTO Chambre (idPriseChambre) VALUES (:idPriseChambre)";
        $result = ChambreImpl::Stmt($sql, $chambre);
        if ($result) {
            echo "Insertion réussie ! ID de la nouvelle chambre : " . self::$db->lastInsertRowID();
        } else {
            echo "Erreur lors de l'insertion : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    /**
     * Met à jour une chambre existante dans la table.
     * @param Chambre $chambre L'objet Chambre à mettre à jour
     */
    public static function updateTable($chambre) {
        $sql = "UPDATE Chambre SET idPriseChambre = :idPriseChambre WHERE idChambre = :id";
        $result = ChambreImpl::Stmt($sql, $chambre);
        if ($result) {
            echo "Mise à jour réussie ! Nombre de lignes affectées : " . self::$db->changes();
        } else {
            echo "Erreur lors de la mise à jour : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    /**
     * Affiche le contenu de la table Chambre.
     * @param string $tableName Le nom de la table (devrait être "Chambre")
     */
    public static function afficherContenuTable($tableName) {
        $sql = "SELECT * FROM " . SQLite3::escapeString($tableName);
        $result = self::$db->query($sql);

        if ($result) {
            echo "<h2>Contenu de la table $tableName:</h2>";
            echo "<table border='1'><tr><th>ID Chambre</th><th>ID Prise Chambre</th></tr>";
            
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['idChambre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['idPriseChambre']) . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
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