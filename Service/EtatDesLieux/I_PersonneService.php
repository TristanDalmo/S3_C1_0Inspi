<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ . "../../Model/Personne.php");
use Model\Personne;

// Définition de l'interface I_PersonneService
interface I_PersonneService
{
    /**
     * Méthode pour créer une personne.
     *
     * @param Personne $personne L'objet personne à créer.
     * @return void
     */
    public function create(Personne $personne);

    /**
     * Méthode pour mettre à jour une personne.
     *
     * @param Personne $personne L'objet Personne à mettre à jour.
     * @return void
     */
    public function update(Personne $personne);

    /**
     * Méthode pour supprimer une personne.
     *
     * @param int $id L'identifiant de la personne à supprimer.
     * @param int $id2 l'identifiant de l'états des lieux 
     * @return void
     */
    public function delete(int $id,int $id2);

    /**
     * Méthode pour récupérer une personne par son identifiant.
     *
     * @param int $id L'identifiant de la personne à récupérer.
     * @return Personne L'objet Personne correspondant.
     */
    public function getById(int $id): Personne;
}




?>