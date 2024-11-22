<?php

namespace Service\Media;

/**
 * Interface de gestion de méthodes concernant les dossiers
 */
interface I_DossiersManagerService {

    /**
     * Méthode récursive permettant de vider un dossier et de le supprimer
     * @param mixed $Dossier_Cible
     * @return void
     */
    function rmdir_recursif($Dossier_Cible);
}





?>