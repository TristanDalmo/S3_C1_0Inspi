<?php

    namespace Service\RetourService;
    require_once __DIR__."I_RetourService.php";
    use Service\RetourService\I_RetourService;
    require_once __DIR__."././MediaMetier.php";
    use RetourMetier\Retour;
    require_once __DIR__."/../../RetourMetier.php";

    class RetourService implements I_RetourService
    {
        public function EnvoieRetour(string $message)
        {
            $retour = new Retour();
            $retour->EnvoieRetour($message);
        }
    }

?>