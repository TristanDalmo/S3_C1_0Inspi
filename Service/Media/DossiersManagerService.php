<?php

namespace Service\Media;

require_once(__DIR__ . "/I_DossiersManagerService.php");
use Service\Media\I_DossiersManagerService;
require_once(__DIR__ . "/../../MediaMetier/DossiersManager.php");
use MediaMetier\DossiersManager;

/**
 * Classe de gestion de méthodes concernant les dossiers
 */
class DossiersManagerService implements I_DossiersManagerService {

    function rmdir_recursif($Dossier_Cible) {
        (new DossiersManager())->rmdir_recursif($Dossier_Cible);
    }
}





?>