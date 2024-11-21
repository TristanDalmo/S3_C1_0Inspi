<?php

    namespace Service\MediaService;
    require_once __DIR__."/I_MediaService.php";
    use Service\MediaService\I_MediaService;
    require_once __DIR__."/../../MediaMetier/MediaManager.php";
    use MediaMetier\MediaManager;

    class MediaService implements I_MediaService
    {

        public function InsertionMedias(array $donnees, $Dossier_Cible)
        {
            $mediaManager=new MediaManager();
            $mediaManager->InsertionMedia($donnees, $Dossier_Cible);
        }
    }


?>