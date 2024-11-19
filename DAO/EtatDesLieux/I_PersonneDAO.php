<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__."../../Model/Personne.php");
use Model\Personne;

/**
 * Interface pour la classe DAO de la table Personne
 */
interface I_PersonneDAO {
    /**
     * Méthode permettant de créer une personne dans la BDD
     * @param \Model\Personne $personne Personne à insérer
     * @return int Id de l'élément créé
     */
    public function Create(Personne $personne) : int;

    /**
     * Méthode permettant de mettre à jour une personne dans la BDD
     * @param \Model\Personne $personne Personne à mettre à jour
     */
    public function Update(Personne $personne);

    /**
     * Méthode permettant d'effacer une personne de la BDD
     * @param int $id id de la personne à supprimer
     */
    public function Delete(int $id);

    /**
     * Méthode permettant d'obtenir une personne via son id
     * @param int $id id de la personne
     * @return \Model\Personne Personne obtenu avec l'id
     */
    public function GetById(int $id):Personne;
}