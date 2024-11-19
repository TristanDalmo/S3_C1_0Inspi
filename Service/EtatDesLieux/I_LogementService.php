<?php

use Model\Logement;

interface I_LogementService
{
    /**
     * Crée un nouveau logement.
     *
     * @param Logement $logement L'entité à créer.
     * @return void
     */
    public function create(Logement $logement);

    /**
     * Met à jour un logement existant.
     *
     * @param Logement $logement L'entité à mettre à jour.
     * @return void
     */
    public function update(Logement $logement);

    /**
     * Supprime un logement en fonction de son identifiant.
     *
     * @param int $id L'identifiant du logement à supprimer.
     * @return void
     */
    public function delete(int $id);

    /**
     * Récupère un logement par son identifiant.
     *
     * @param int $id L'identifiant du logement.
     * @return Logement L'entité correspondante.
     */
    public function getById(int $id): Logement;

}


?>