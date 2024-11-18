<?php

namespace DAO\I_EtatDesLieuxDAO;
require_once(__DIR__."../../Model/Piece.php");
use Model\EtatDesLieux;

/**
 * Interface pour la classe DAO de la table Unit
 */
interface I_EtatDesLieuxDAO {
    /**
     * Méthode permettant de créer un état des lieux dans la BDD
     * @param \Model\EtatDesLieux $etatDesLieux état des lieux à insérer
     * @return void
     */
    public function Create(EtatDesLieux $etatDesLieux);
    /**
     * Méthode permettant de mettre à jour un état des lieux dans la BDD
     * @param \Model\EtatDesLieux $etatDesLieux
     * @return void
     */
    public function Update(EtatDesLieux $etatDesLieux);
    /**
     * Méthode permettant d'effacer un état des lieux 
     * @param int $id id de l'état des lieux à supprimer
     * @return void
     */
    public function Delete(int $id);
    /**
     * Méthode permettant d'obtenir un état des lieux via son id
     * @param int $id id de l'état des lieux
     * @return \Model\EtatDesLieux l'etat des lieux obtenu avec l'id
     */
    public function GetById(int $id):EtatDesLieux;
}