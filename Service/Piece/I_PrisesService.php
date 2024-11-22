<?php

namespace Service\Piece;
require_once(__DIR__ . "../../Model/Prises.php");
use Model\Prises;

// Définition de l'interface I_PrisesService
interface I_PrisesService
{
    /**
     * Méthode pour créer une prise.
     * @param \Model\Prises $prises L'objet Prises à créer.
     * @return int Id de l'élément créé
     */
    public function create(Prises $prises):int;

    /**
     * Méthode pour mettre à jour une prise.
     *
     * @param Prises $prises L'objet Prises à mettre à jour.
     * @return void
     */
    public function update(Prises $prises);

    /**
     * Méthode pour supprimer une prise.
     *
     * @param int $id L'identifiant de la prise à supprimer.
     * @return void
     */
    public function delete(int $id);

    /**
     * Méthode pour récupérer une prise par son identifiant.
     *
     * @param int $id L'identifiant de la prise à récupérer.
     * @return Prises L'objet Prises correspondant.
     */
    public function getById(int $id): Prises;
}
?>