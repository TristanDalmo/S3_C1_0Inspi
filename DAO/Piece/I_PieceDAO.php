<?php

namespace DAO\Piece;
require_once(__DIR__ . "/../../Model/Piece.php");
use Model\Piece;

/**
 * Interface d'une DAO de pièce de logement
 */
interface I_PieceDAO {

    /**
     * Méthode permettant de créer une pièce dans la BDD
     * @param \Model\Piece $piece Pièce à insérer
     * @return string Message d'erreur ou de succès
     */
    public function Create(Piece $piece): string;

    /**
     * Méthode permettant de modifier les données d'une pièce
     * @param \Model\Piece $piece Pièce à modifier
     * @return string Message d'erreur ou de succès
     */
    public function Update(Piece $piece): string;

    /**
     * Méthode permettant de supprimer une pièce
     * @param int $id Id de la pièce à supprimer
     * @return string Message d'erreur ou de succès
     */
    public function Delete(int $id): string;

    /**
     * Méthode permettant de sélectionner une pièce dans la BDD à partir de son id
     * @param int $id Id de la pièce à sélectionner
     * @return \Model\Piece Pièce sélectionnée
     */
    public function getById(int $id) : Piece;
}





?>