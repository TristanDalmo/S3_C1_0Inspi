<?php

namespace TestUnitaire;

require_once(__DIR__ . "/TestBDD/EtatDeslieux/TestEtatDesLieux.php");
require_once(__DIR__ . "/TestBDD/EtatDeslieux/TestLocataire.php");
use TestUnitaire\TestBDD\EtatDesLieux\TestEtatDesLieux;
use TestUnitaire\TestBDD\EtatDesLieux\TestLocataire;

class MainTestUnitaire {

    private array $tests ;


    public function __construct() {

        $this->tests = [
            new TestEtatDesLieux(),
            new TestLocataire()
        ];
    }


    public function Execute() : string {

        $retour = "<h1> Tests Unitaires </h1><br>";

        foreach ($this->tests as $test) {
            $donnees = $test->Execute();

            $retour .= "<section>";
            
            foreach ($donnees as $data) {
                $retour .= $data . "<br>";
            }

            $retour .= "</section>";

        }

        return $retour;

    }


}

$tests = new MainTestUnitaire();
echo $tests->Execute();


?>