<?php


namespace Service\Piece;
require_once(__DIR__ . "/../../Model/Piece.php");
use Model\Piece;

/**
 *Interface d'une Service d'une piece
 */
interface I_PieceService 
{
    /**
     * Crée une nouvelle pièce
     * @param \Model\Piece $piece la pièce a ajouter
     * @return int Id de l'élément créé
     */
    public function Create(Piece $piece):int;

    /**
     * Supprime une pièce existante.
     * 
     * @param Piece $piece la pièce à supprimer 
     * @return void
     */
    public function Delete( int $id);

    /**
     * Récupère une pièce par son identifiant unique.
     * 
     * @param int $id l'id de la pièce a recuperer 
     * @return Piece la pièce avec l'ID correspondant rnvoi null si l'id n'existe pas 
     */
    public function getById(int $id): Piece;

    /**
     * Met à jour une pièce existante.
     * 
     * @param Piece $piece la pièce a modifier  
     * @return void
     */
    public function Update(Piece $piece);
}

?>