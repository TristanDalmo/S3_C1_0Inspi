<?php

    /**
         * Classe permettant de faire le lien entre la base de donnnées et le code.
     */
    class connexionBase
    {
        private static ?SQLite3 $db=null;
        private static ?self $instance = null;

        private function __construct()
        {
            
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
         * Fonction static retournant la base de données stockées en attribut et si il n'existe pas le créer.
         */
        public static function getInstance():self {
            if (self::$instance == null) {
                self::$instance= new self();
                self::$db = new SQLite3('../baseDeDonnees.db'); 
            }
            return self::$instance;
        }

        public static function getBDD():SQLite3{
            return self::$db;
        }
    }
?>