<?php

namespace DAO\Piece;
require_once(__DIR__ . "/../../Model/Prises.php");
use Model\Prises;

/**
 * Interface d'une DAO d'un ensemble de prises
 */
interface I_PrisesDAO {

    /**
     * Méthode permettant de créer un ensemble de prises dans la BDD
     * @param \Model\Prises $prises Ensemble de prises à insérer
     * @return int Id de l'élément créé
     */
    public function Create(Prises $prises): int;

    /**
     * Méthode permettant de modifier les données d'un ensemble de prises
     * @param \Model\Prises $prises Ensemble de prises à modifier
     */
    public function Update(Prises $prises);

    /**
     * Méthode permettant de supprimer un ensemble de prises
     * @param int $id Id d'un ensemble de prises à supprimer
     */
    public function Delete(int $id);

    /**
     * Méthode permettant de sélectionner un ensemble de prises dans la BDD à partir de son id
     * @param int $id Id de l'ensemble de prises à sélectionner
     * @return \Model\Prises Ensemble de prises sélectionné
     */
    public function getById(int $id) : Prises;
}





?>