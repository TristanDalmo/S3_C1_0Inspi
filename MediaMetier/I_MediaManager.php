<?php

    namespace MediaMetier;

    /**
     * Interface d'ajout de données au serveur
     */
    interface I_MediaManager
    {
        /**
         * Méthode permettant d'insérer les fichiers dans le serveur
         * @param array $donnees Données du serveur
         * @param string $Dossier_Cible Chemin utilisé
         * @return void
         */
        public function InsertionMedia(array $donnees, string $Dossier_Cible);
    }
?>