<?php

    namespace Service\MediaService;

    interface I_MediaService
    {
        /**
         * Méthode permettant d'insérer les fichiers dans le serveur
         * @param array $donnees Données du serveur
         * @param string $Dossier_Cible Chemin utilisé
         * @return void
         */
        public function InsertionMedias(array $donnees,string $Dossier_Cible);
    }