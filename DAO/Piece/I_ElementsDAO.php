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
     * @return string Message d'erreur ou de succès
     */
    public function Create(Elements $element) : string;

    /**
     * Méthode permettant de modifier les données d'un élément
     * @param \Model\Elements $element Élément à modifier
     * @return string Message d'erreur ou de succès
     */
    public function Update(Elements $element): string;

    /**
     * Méthode permettant de supprimer un élément
     * @param int $id Id d'un élément à supprimer
     * @return string Message d'erreur ou de succès
     */
    public function Delete(int $id): string;

    /**
     * Méthode permettant de sélectionner un élément dans la BDD à partir de son id
     * @param int $id Id de l'élément à sélectionner
     * @return \Model\Elements Élément sélectionné
     */
    public function getById(int $id) : Elements;
}





?>