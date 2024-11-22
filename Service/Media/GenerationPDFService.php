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

    public function GenererPDF(string $cheminFichier) {
        (new GenerationPDF())->GenererPDF($cheminFichier);
    }
    
}