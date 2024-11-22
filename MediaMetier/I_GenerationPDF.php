<?php

namespace MediaMetier;


/**
 * Interface servant à générer un fichier PDF
 */
interface I_GenerationPDF {

    /**
     * Méthode permettant de générer le fichier PDF
     * @param array $donnees Tableau de données de l'état des lieux
     * @param string $cheminFichier Chemin vers lequel envoyer le fichier et récupérer le fichier word
     * @return void
     */
    public function GenererPDF(array $donnees, string $cheminFichier) ;
    
}