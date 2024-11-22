<?php

namespace MediaMetier;


/**
 * Interface servant à générer un fichier Word
 */
interface I_GenerationWord {

    /**
     * Méthode permettant de générer le fichier word
     * @param array $donnees Tableau de données de l'état des lieux
     * @param string $cheminFichier Chemin vers lequel envoyer le fichier
     * @return void
     */
    public function GenererWord(array $donnees, string $cheminFichier) ;


    
}