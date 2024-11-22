<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ ."../../Model/Personne.php");
use Model\Personne;
require_once(__DIR__ ."../../DAO/EtatDesLieux/PersonneDAO.php");
use DAO\EtatDesLieux\PersonneDAO;

/**
 * Couche service servant aux méthodes liées à la table Personne
 */
class PersonneService implements I_PersonneService{

    public function create(Personne $personne) : int
    {
        $daoPersonne = new PersonneDAO();
        return $daoPersonne->create($personne);
    }
    public function update(Personne $personne)
    {
        $daoPersonne = new PersonneDAO();
        $daoPersonne->update($personne);
    }
    public function delete(int $id)
    {
        $daoPersonne = new PersonneDAO();
        $daoPersonne->delete($id);
    }
    public function getById(int $id): Personne
    {
        $daoPersonne = new PersonneDAO();
        return $daoPersonne->getById($id);
    }
    public function GetByNomPrenomAdresse(Personne $personne): Personne|null{
        $daoPersonne = new PersonneDAO();
        return $daoPersonne->getByNomPrenomAdresse($personne);
    }
}
?>