<?php

namespace S3_C1_0Inspi\Service\Piece;

require_once(__DIR__ . "../../Model/Elements.php");
use Model\Elements;

// Définition de l'interface iElementsService
interface iElementsService
{
    /**
     * Méthode pour créer un élément.
     *
     * @param Elements $elements L'objet Elements à créer.
     * @return void
     */
    public function create(Elements $elements);

    /**
     * Méthode pour mettre à jour un élément.
     *
     * @param Elements $elements L'objet Elements à mettre à jour.
     * @return void
     */
    public function update(Elements $elements);

    /**
     * Méthode pour supprimer un élément.
     *
     * @param int $id L'identifiant de l'élément à supprimer.
     * @return void
     */
    public function delete(int $id);

    /**
     * Méthode pour récupérer un élément par son identifiant.
     *
     * @param int $id L'identifiant de l'élément à récupérer.
     * @return Elements L'objet Elements correspondant.
     */
    public function getById(int $id): Elements;
}
?>