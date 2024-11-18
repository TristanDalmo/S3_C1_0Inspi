<?php

namespace DAO\Piece;
require_once(__DIR__ . "/../../Model/Electromenager.php");
use Model\Electromenager;

/**
 * Interface d'une DAO d'élément électroménager d'une pièce
 */
interface I_ElectromenagerDAO {

    /**
     * Méthode permettant de créer un élément électroménager dans la BDD
     * @param \Model\Electromenager $electromenager Élément électroménager à insérer
     * @return void
     */
    public function Create(Electromenager $electromenager);

    /**
     * Méthode permettant de modifier les données d'une pièce
     * @param \Model\Electromenager $electromenager Élément électroménager à modifier
     * @return void
     */
    public function Update(Electromenager $electromenager);

    /**
     * Méthode permettant de supprimer un élément électroménager
     * @param int $id Id de l'élément électroménager à supprimer
     * @return void
     */
    public function Delete(int $id);

    /**
     * Méthode permettant de sélectionner un élément électroménager dans la BDD à partir de son id
     * @param int $id Id de l'élément électroménager à sélectionner
     * @return \Model\Electromenager Élément électroménager sélectionnée
     */
    public function getById(int $id) : Electromenager;
}





?>