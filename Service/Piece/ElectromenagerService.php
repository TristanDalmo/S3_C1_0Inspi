<?php


namespace Service\Piece;
require_once(__DIR__ . "/../../Model/Electromenager.php");

use DAO\Piece\ElectromenagerDAO;
use Model\Electromenager;




class ElectromenagerService implements I_ElectomenagerService {

    public function Create(Electromenager $electromenager)
    {
        $daoelectro = new ElectromenagerDAO(); 
        $daoelectro->Create($electromenager); 
    }
    public function  Delete( int $id)
    {
        $daoelectro = new ElectromenagerDAO(); 
        $daoelectro->Delete($id);
    }
    public function getById(int $id): Electromenager
    {
        $daoelectro = new ElectromenagerDAO(); 
        return $daoelectro->getById($id);
    }
    public function Update(Electromenager $electromenager)
    {
        $daoelectro = new ElectromenagerDAO(); 
        $daoelectro->Update($electromenager); 
    }
    
}

?>