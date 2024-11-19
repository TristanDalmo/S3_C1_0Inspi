<?php
namespace Service\EtatDesLieux;

use DAO\EtatDesLieux\PersonneDAO;

require_once(__DIR__ ."../..//Model/Personne.php");
use Model\Personne;
require_once(__DIR__ ."../../DAO/EtatDesLieux/I_PersonneDAO.php");
use DAO\EtatDesLieux\I_PersonneDAO;

class PersonneService implements I_PersonneService{

    public function create(Personne $personne)
    {
        $daoPersonne = new PersonneDAO();
        $daoPersonne->create($personne);
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
}
?>