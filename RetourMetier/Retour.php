<?php

    namespace RetourMetier;
    use RetourMetier\I_Retour;

    class Retour implements I_Retour
    {
        public function EnvoieRetour(string $message)
        {
            
                header('Content-Type : application/json');
                echo json_encode(['message' => $message]);
                exit();           
        }
    }

?>