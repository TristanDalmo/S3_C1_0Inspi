<?php

namespace MediaMetier;

require_once(__DIR__ . "/I_DossiersManager.php");
use MediaMetier\I_DossiersManager;

/**
 * Interface de gestion de méthodes concernant les dossiers
 */
class DossiersManager implements I_DossiersManager {

    function rmdir_recursif($Dossier_Cible) {
        foreach(scandir($Dossier_Cible) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$Dossier_Cible/$file")) $this->rmdir_recursif("$Dossier_Cible/$file");
            else unlink("$Dossier_Cible/$file");
        }
        rmdir($Dossier_Cible); 
    }
}





?>