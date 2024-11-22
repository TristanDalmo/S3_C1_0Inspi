<?php

    namespace RetourMetier;
    use RetourMetier\I_Retour;
    require_once(__DIR__."/I_Retour.php");


    class Retour implements I_Retour
    {
        public function EnvoieRetour(string $message)
        {
            header('Content-Type: application/json');
            echo json_encode(['message' => $message]);
            exit;
        }
    }

?>