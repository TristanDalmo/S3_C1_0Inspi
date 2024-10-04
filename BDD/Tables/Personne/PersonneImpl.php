<?php
require_once("I_BDD.php"); 
require_once("connectionBDD.php");

class PersonneImpl implements I_BDD{
    private static $db;

    

    public static function insertTable(Personne $personne) {
        $sql = "INSERT INTO Personne (idPersonne, civilite, prenom, adresse) VALUES (:id, :civilite, :prenom,:nom,:adresse,:etatDesLieux)";
        
        $stmt = connectionBDD::getDataBase()->prepare($sql);
        $stmt->bindValue(':id', $personne->getIdPersonne(), SQLITE3_INTEGER);
        $stmt->bindValue(':civilite', $personne->getCivilite(),QLITE3_TEXT);
        $stmt->bindValue(':prenom', $personne->getPrenom(), SQLITE3_TEXT);
        $stmt->bindValue(':nom', $personne->getType(), SQLITE3_TEXT);
        $stmt->bindValue(':adresse', $etatDesLieux->getAdresse(), SQLITE3_TEXT);
        $stmt->bindValue(':etatDesLieux', $etatDesLieux->getIdEtatDesLieux(), SQLITE3_TEXT);

        $result = $stmt->execute();
    }

    public static function DeleteTable(int $id) {
        $sql = "DELETE FROM PERSONNE WHERE idPersonne = :id";
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':id', $id,SQLITE3_INTEGER);
        $result = $stmt->execute();
    }
}


?>