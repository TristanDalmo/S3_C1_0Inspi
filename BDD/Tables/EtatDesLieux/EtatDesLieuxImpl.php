<?php

require_once("I_BDD.php"); 

class EtatDesLieuxImpl implements I_BDD{

    public static function Stmt($sql,$etatDesLieux){
        self::$db->exec('BEGIN TRANSACTION');
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $etatDesLieux->getIdEtatDesLieux(), SQLITE3_INTEGER);
        $stmt->bindValue(':dateEntree', $etatDesLieux->getDateEntree()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':dateSortie', $etatDesLieux->getDateSortie()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':type', $etatDesLieux->getType(), SQLITE3_TEXT);
        $stmt->bindValue(':media', $etatDesLieux->getMedia(), SQLITE3_TEXT);        
        $result = $stmt->execute();
        self::$db->exec('COMMIT');
        return $result;
    }

    public static function insertTable($etatDesLieux) {
        $sql = "INSERT INTO EtatDesLieux (dateEntree, dateSortie, type, media) VALUES (:dateEntree, :dateSortie, :type, :media)";
        $result=EtatDesLieuxImpl::Stmt( $sql,$etatDesLieux );
        if ($result) {
            echo "Insertion réussie ! ID de la nouvelle ligne : " . self::$db->lastInsertRowID();
        } else {
            echo "Erreur lors de l'insertion : " . self::$db->lastErrorMsg();
        }
        
        echo "<br>";
    }

    public static function DeleteTable(int $id) {
        $sql = "DELETE FROM ETATDESLIEUX WHERE idEtatDesLieux = :id";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $id,SQLITE3_INTEGER);
        $result = $stmt->execute();
    }

    public static function updateTable($etatDesLieux) {
        $sql = "UPDATE EtatDesLieux SET dateEntree = :dateEntree, dateSortie = :dateSortie, type = :type, media = :media WHERE idEtatDesLieux = :id";
        $result=EtatDesLieuxImpl::Stmt( $sql,$etatDesLieux );
        if ($result) {
            echo "Mise à jour réussie ! Nombre de lignes affectées : " . self::$db->changes();
        } else {
            echo "Erreur lors de la mise à jour : " . self::$db->lastErrorMsg();
        }
        echo "<br>";
    }
}

?>