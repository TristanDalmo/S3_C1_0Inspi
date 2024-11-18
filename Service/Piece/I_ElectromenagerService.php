<?php


namespace Service\Piece;
require_once(__DIR__ . "/../../Model/Electromenager.php");
use Model\Electromenager;


/**
 *Interface d'une Service d'une piece
 */
interface I_ElectomenagerService 
{
    /**
    * Crée un nouvel électroménager.
    *
    * @param Electromenager $electromenager L'objet contenant les données de l'électroménager.
    * @return void
    */
    public function create(Electromenager $electromenager);

    /**
     * Met à jour un électroménager existant.
     *
     * @param Electromenager $electromenager L'objet contenant les nouvelles données.
     * @return void
     */
    public function update(Electromenager $electromenager);
 
    /**
     * Supprime un électroménager par son ID.
     *
     * @param int $ID L'identifiant unique de l'électroménager.
     * @return void
     */
    public function delete(int $ID);
 
    /**
     * Récupère un électroménager par son ID.
     *
     * @param int $ID L'identifiant unique de l'électroménager.
     * @return Electromenager L'électroménager correspondant.
     */
    public function getByID(int $ID);
 
}

?>