<?php

namespace Service\Piece;

require_once(__DIR__ . "/../../Model/Prises.php");
use Model\Prises;
require_once(__DIR__ . "/../../DAO/Piece/PrisesDAO.php");
use DAO\Piece\PrisesDAO;
require_once(__DIR__ . "/I_PrisesService.php");

/**
 * Implémentation de l'interface I_PrisesService.
 */
class PrisesService implements I_PrisesService
{
    public function create(Prises $prises):int
    {
        $daoPrises = new PrisesDAO();
        return $daoPrises->create($prises);
    }
    public function update(Prises $prises)
    {
        $daoPrises = new PrisesDAO();
        $daoPrises->update($prises);
    }
    public function delete(int $id)
    {
        $daoPrises = new PrisesDAO();
        $daoPrises->delete($id);
    }
    public function getById(int $id): Prises
    {
        $daoPrises = new PrisesDAO();
        return $daoPrises->getById($id);
    }
}
?>