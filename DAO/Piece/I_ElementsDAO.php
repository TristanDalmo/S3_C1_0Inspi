<?php

namespace DAO\Piece;
require_once(__DIR__ . "/../../Model/Elements.php");
use Model\Elements;

/**
 * Interface d'une DAO d'un élément 
 */
interface I_ElementsDAO {

    /**
     * Méthode permettant de créer un élément dans la BDD
     * @param \Model\Elements $element Élément à insérer
     * @return int Id de l'élément créé
     */
    public function Create(Elements $element) : int;

    /**
     * Méthode permettant de modifier les données d'un élément
     * @param \Model\Elements $element Élément à modifier
     */
    public function Update(Elements $element);

    /**
     * Méthode permettant de supprimer un élément
     * @param int $id Id d'un élément à supprimer
     */
    public function Delete(int $id);

    /**
     * Méthode permettant de sélectionner un élément dans la BDD à partir de son id
     * @param int $id Id de l'élément à sélectionner
     * @return \Model\Elements Élément sélectionné
     */
    public function getById(int $id) : Elements;
}





?>