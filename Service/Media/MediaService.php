<?php

    namespace Service\MediaService;
    require_once __DIR__."I_MediaService.php";
    use Service\MediaService\I_MediaService;
    require_once __DIR__."././MediaMetier.php";
    use MediaMetier\MediaManager;

    class MediaService implements I_MediaService
    {

        public function InsertionMedias(array $donnees)
        {
            $mediaManager=new MediaManager();
            return $mediaManager->InsertionMedia($donnees);
        }
    }


?>