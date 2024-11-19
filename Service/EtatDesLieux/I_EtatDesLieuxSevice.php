<?php

use Model\EtatDesLieux;

interface I_EtatDesLieuxService 
{
    /**
     * Crée un nouvel état des lieux.
     *
     * @param EtatDesLieux $edl L'etat des lieux à créer.
     * @return void
     */
    public function create(EtatDesLieux $edl);

    /**
     * Met à jour un état des lieux existant.
     *
     * @param EtatDesLieux $edl L'etat des lieux à mettre à jour.
     * @return void
     */
    public function update(EtatDesLieux $edl);

    /**
     * Supprime un état des lieux en fonction de son identifiant.
     *
     * @param int $id L'identifiant de l'état des lieux à supprimer.
     * @return void
     */
    public function delete(int $id);

    /**
     * Récupère un état des lieux par son identifiant.
     *
     * @param int $id L'identifiant de l'état des lieux.
     * @return EtatDesLieux L'etat des lieux correspondante.
     */
    public function getById(int $id): EtatDesLieux;

}


?>
