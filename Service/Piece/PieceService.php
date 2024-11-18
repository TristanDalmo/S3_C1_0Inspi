<?php


namespace Service\Piece;
require_once(__DIR__ . "/../../Model/Piece.php");
use Model\Piece;
require_once(__DIR__ ."/../../DAO/Piece/PieceDAO.php");
use DAO\Piece\PieceDAO;


class PieceService implements I_PieceService {

    public function Create(Piece $piece)
    {
        $daoPiece = new PieceDAO();    
        $daoPiece->Create($piece);

    }
    public function Delete(int $id)
    {
        $daoPiece = new PieceDAO();    
        $daoPiece->Delete($id);
    }
    public function getById(int $id): Piece
    {
        $daoPiece = new PieceDAO();    
        return $daoPiece->getById($id);
    }
    public function Update(Piece $piece)
    {
        $daoPiece = new PieceDAO();    
        $daoPiece->Update($piece);
    }
}


?>