<?php

namespace Service\Media;

require_once(__DIR__ . "/I_GenerationPDFService.php");
use Service\Media\I_GenerationPDFService;

require_once(__DIR__ . "/../../MediaMetier/GenerationPDF.php");
use MediaMetier\GenerationPDF;

/**
 * Interface servant à générer un fichier PDF
 */
class GenerationPDFService implements I_GenerationPDFService {

    /**
     * Méthode permettant de générer le fichier PDF
     * @param array $donnees Tableau de données de l'état des lieux
     * @param string $cheminFichier Chemin vers lequel envoyer le fichier et récupérer le fichier word
     * @return void
     */
    public function GenererPDF(array $donnees, string $cheminFichier) {
        (new GenerationPDF())->GenererPDF($donnees, $cheminFichier);
    }
    
}