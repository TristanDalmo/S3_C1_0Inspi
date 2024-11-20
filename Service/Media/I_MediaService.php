<?php

    namespace Service\MediaService;

    interface I_MediaService
    {
        /**
         * Méthode permettant d'insérer les fichiers dans le serveur
         * @param array $donnees Données du serveur
         * @return string Renvoie le chemin utilisé
         */
        public function InsertionMedias(array $donnees);
    }