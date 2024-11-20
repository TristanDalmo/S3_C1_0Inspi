<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ . "/../../Model/Personne.php");
use Model\Personne;

/**
 * (Interface) Couche service servant aux méthodes liées à la table Personne
 */
interface I_PersonneService
{
    /**
     * Méthode pour créer une personne.
     *
     * @param Personne $personne L'objet personne à créer.
     * @return int Id de la personne créée
     */
    public function create(Personne $personne) : int;

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
     * @return void
     */
    public function delete(int $id);

    /**
     * Méthode pour récupérer une personne par son identifiant.
     *
     * @param int $id L'identifiant de la personne à récupérer.
     * @return Personne L'objet Personne correspondant.
     */
    public function getById(int $id): Personne;
    /**
     * Méthode permettant d'obtenir une personne via son nom,prenom et adresse
     * @param \Model\Personne $personne la Personne à obtenir
     * @return \Model\Personne|null Personne obtenu avec son nom,prenom et adresse ou null si elle n'exist epas dans la base de données
     */
    public function GetByNomPrenomAdresse(Personne $personne):Personne|null;
}




?>