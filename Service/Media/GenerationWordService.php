<?php

namespace Service\Media;

require_once(__DIR__ . "/I_GenerationWordService.php");
use Service\Media\I_GenerationWordService;

require_once(__DIR__ . "/../../MediaMetier/GenerationWord.php");
use MediaMetier\GenerationWord;

/**
 * Interface servant à générer un fichier Word
 */
class GenerationWordService implements I_GenerationWordService {

    /**
     * Méthode permettant de générer le fichier word
     * @param array $donnees Tableau de données de l'état des lieux
     * @param string $cheminFichier Chemin vers lequel envoyer le fichier
     * @return void
     */
    public function GenererWord(array $donnees, string $cheminFichier) {

        (new GenerationWord())->GenererWord($donnees, $cheminFichier);

    }


    
}