<?php

namespace Service\EtatDesLieux;
require_once(__DIR__ ."../../Model/Locataire.php");
use Model\Locataire;

/**
 * (Interface) Couche service servant aux méthodes liées à la table Locataire
 */
interface I_LocataireService
{
    /**
     * Méthode pour créer un(e) locataire.
     *
     * @param Locataire $locataire L'objet locataire à créer.
     * @return void
     */
    public function create(Locataire $locataire);
    /**
     * Méthode pour supprimer un(e) locataire.
     *
     * @param int $id L'identifiant du locataire à supprimer.
     * @param int $id2 L'identifiant de l'états des lieux 
     * @return void
     */
    public function delete(int $id,int $id2);

    /**
     * Méthode pour récupérer un(e) locataire par son identifiant.
     *
     * @param int $id L'identifiant du locataire à récupérer.
     * @param int $id2 L'identifiant de l'états des lieux
     * @return Locataire L'objet Locataire correspondant.
     */
    public function getById(int $id,int $id2): Locataire;

}
?>