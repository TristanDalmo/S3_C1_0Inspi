<?php

require_once("I_BDD.php");

class ElementChambreImpl implements I_BDD {
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
     * Prépare et exécute une requête SQL avec les données de l'élément de chambre.
     * @param string $sql La requête SQL à exécuter
     * @param T_ElementChambre $elementChambre L'objet T_ElementChambre contenant les données
     * @return SQLite3Result Le résultat de l'exécution de la requête
     */
    public static function Stmt($sql, $elementChambre) {
        self::$db->exec('BEGIN TRANSACTION');
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $elementChambre->getIdElementChambre(), SQLITE3_INTEGER);
        $stmt->bindValue(':description', $elementChambre->getDescription(), SQLITE3_TEXT);
        $stmt->bindValue(':etatEntree', $elementChambre->getEtatEntree(), SQLITE3_TEXT);
        $stmt->bindValue(':etatSortie', $elementChambre->getEtatSortie(), SQLITE3_TEXT);
        $stmt->bindValue(':idChambre', $elementChambre->getIdChambre(), SQLITE3_INTEGER);
        $result = $stmt->execute();
        self::$db->exec('COMMIT');
        return $result;
    }

    /**
     * Insère un nouvel élément de chambre dans la table.
     * @param T_ElementChambre $elementChambre L'objet T_ElementChambre à insérer
     */
    public static function insertTable($elementChambre) {
        $sql = "INSERT INTO ElementChambre (description, etatEntree, etatSortie, idChambre) VALUES (:description, :etatEntree, :etatSortie, :idChambre)";
        $result = ElementChambreImpl::Stmt($sql, $elementChambre);
        if ($result) {
            echo "Insertion réussie ! ID du nouvel élément de chambre : " . self::$db->lastInsertRowID();
        } else {
            echo "Erreur lors de l'insertion : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    /**
     * Met à jour un élément de chambre existant dans la table.
     * @param T_ElementChambre $elementChambre L'objet T_ElementChambre à mettre à jour
     */
    public static function updateTable($elementChambre) {
        $sql = "UPDATE ElementChambre SET description = :description, etatEntree = :etatEntree, etatSortie = :etatSortie, idChambre = :idChambre WHERE idElementChambre = :id";
        $result = ElementChambreImpl::Stmt($sql, $elementChambre);
        if ($result) {
            echo "Mise à jour réussie ! Nombre de lignes affectées : " . self::$db->changes();
        } else {
            echo "Erreur lors de la mise à jour : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }

    /**
     * Affiche le contenu de la table ElementChambre.
     * @param string $tableName Le nom de la table (devrait être "ElementChambre")
     */
    public static function afficherContenuTable($tableName) {
        $sql = "SELECT * FROM " . SQLite3::escapeString($tableName);
        $result = self::$db->query($sql);

        if ($result) {
            echo "<h2>Contenu de la table $tableName:</h2>";
            echo "<table border='1'><tr><th>ID</th><th>Description</th><th>État Entrée</th><th>État Sortie</th><th>ID Chambre</th></tr>";
            
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['idElementChambre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etatEntree']) . "</td>";
                echo "<td>" . htmlspecialchars($row['etatSortie']) . "</td>";
                echo "<td>" . htmlspecialchars($row['idChambre']) . "</td>";
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