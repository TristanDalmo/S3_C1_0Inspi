<?php



namespace Service\Piece;
require_once(__DIR__ . "../DAO/Piece/I_PieceDAO.php");
require_once(__DIR__ . "/../../Model/Piece.php");
use Model\Piece;



interface I_PieceService 
{
    public function Create(Piece $piece);
    public function Delete(Piece $piece);
    public function getById(int $id): Piece;
    public function Update(Piece $piece);
       
}





?>