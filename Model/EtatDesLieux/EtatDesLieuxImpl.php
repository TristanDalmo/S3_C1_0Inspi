<?php

require_once(__DIR__ . "/../../test/I_BDD.php"); 
require_once (__DIR__.'/../../test/connexionBase.php');

class EtatDesLieuxImpl implements I_BDD{

    public static function Stmt($sql,$etatDesLieux){
        connexionBase::getBDD()->exec('BEGIN TRANSACTION');
        $stmt = connexionBase::getBDD()->prepare($sql);
        $stmt->bindValue(':id', $etatDesLieux->getIdEtatDesLieux(), SQLITE3_INTEGER);
        $stmt->bindValue(':dateEntree', $etatDesLieux->getDateEntree()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':dateSortie', $etatDesLieux->getDateSortie()->format('Y-m-d'), SQLITE3_TEXT);
        $stmt->bindValue(':type', $etatDesLieux->getType(), SQLITE3_TEXT);
        $stmt->bindValue(':media', $etatDesLieux->getMedia(), SQLITE3_TEXT);        
        $result = $stmt->execute();
        connexionBase::getBDD()->exec('COMMIT');
        return $result;
    }

    public static function insertTable($etatDesLieux) {
        $sql = "INSERT INTO EtatDesLieux (dateEntree, dateSortie, type, media) VALUES (:dateEntree, :dateSortie, :type, :media)";
        $result=EtatDesLieuxImpl::Stmt( $sql,$etatDesLieux );
        if ($result) {
            echo "Insertion réussie ! ID de la nouvelle ligne : ".connexionBase::getBDD()->lastInsertRowID();
        } else {
            echo "Erreur lors de l'insertion : ".connexionBase::getBDD()->lastErrorMsg();
        }
        
        echo "<br>";
    }

    public static function DeleteTable(int $id) {
        $sql = "DELETE FROM ETATDESLIEUX WHERE idEtatDesLieux = :id";
        $stmt = connexionBase::getBDD()->prepare($sql);
        $stmt->bindValue(':id', $id,SQLITE3_INTEGER);
        $result = $stmt->execute();
    }

    public static function updateTable($etatDesLieux) {
        $sql = "UPDATE EtatDesLieux SET dateEntree = :dateEntree, dateSortie = :dateSortie, type = :type, media = :media WHERE idEtatDesLieux = :id";
        $result=EtatDesLieuxImpl::Stmt( $sql,$etatDesLieux );
        if ($result) {
            echo "Mise à jour réussie ! Nombre de lignes affectées : ".connexionBase::getBDD()->changes();
        } else {
            echo "Erreur lors de la mise à jour : ".connexionBase::getBDD()->lastErrorMsg();
        }
        echo "<br>";
    }
}

?>