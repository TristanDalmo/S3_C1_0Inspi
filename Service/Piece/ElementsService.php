<?php
namespace S3_C1_0Inspi\Service\Piece;

use DAO\Piece\ElementsDAO;

require_once(__DIR__ . "/../../Model/Elements.php");
require_once(__DIR__ . "/I_ElementsService.php");


use Model\Elements;

/**
 * Implémentation de l'interface I_ElementsService.
 */
class ElementsService implements iElementsService
{
    public function create(Elements $elements)
    {
        $daoelements = new ElementsDAO(); 
        $daoelements->Create(element: $elements); 
    }
    public function update(Elements $elements)
    {
        $daoelements = new ElementsDAO(); 
        $daoelements->Update(element: $elements);
    }
    public function delete(int $id)
    {
        $daoelements = new ElementsDAO(); 
        $daoelements->Delete( $id);
    }
    public function getById(int $id): Elements
    {
        $daoelements = new ElementsDAO(); 
        $daoelements->getById($id);
    }
}