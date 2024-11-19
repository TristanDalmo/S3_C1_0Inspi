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
         * @return string Renvoie le chemin utilisé
         */
        public function InsertionMedia(array $donnees) : string;
    }
?>