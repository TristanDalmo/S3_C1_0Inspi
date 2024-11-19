<?php

namespace TestUnitaire;

require_once(__DIR__ . "/TestBDD/EtatDeslieux/TestEtatDesLieux.php");
use TestUnitaire\TestBDD\EtatDesLieux\TestEtatDesLieux;
require_once(__DIR__. "/TestBDD/Piece/TestElectromenager.php");
use TestUnitaire\TestBDD\Piece\TestElectromenager;
require_once(__DIR__. "/TestBDD/Piece/TestElements.php");
use TestUnitaire\TestBDD\Piece\TestElements;
require_once(__DIR__. "/TestBDD/Piece/TestPiece.php");
use TestUnitaire\TestBDD\Piece\TestPiece;


class MainTestUnitaire {

    private array $tests ;


    public function __construct() {

        $this->tests = [
            new TestEtatDesLieux(),
            new TestElectromenager(),
            new TestElements(),
            new TestPiece()
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