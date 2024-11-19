<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__."../../Model/Locataire.php");
use Model\Locataire;

/**
 * Interface pour la classe DAO de la table Locataire
 */
interface I_LocataireDAO {
    /**
     * Méthode permettant de créer un locataire dans la BDD
     * @param \Model\Locataire $locataire Locataire à insérer
     */
    public function Create(Locataire $locataire);

    /**
     * Méthode permettant d'effacer un locataire
     * @param int $idPersonne id de la personne locataire
     * @param int $idEtatDesLieux id de l'état des lieux associé
     */
    public function Delete(int $idPersonne, int $idEtatDesLieux);

    /**
     * Méthode permettant d'obtenir un locataire via son id
     * @param int $idPersonne id de la personne locataire
     * @param int $idEtatDesLieux id de l'état des lieux associé
     * @return \Model\Locataire Locataire obtenu avec l'id
     */
    public function GetById(int $idPersonne, int $idEtatDesLieux):Locataire;
}