<?php

namespace TestUnitaire;

require_once(__DIR__ . "/TestBDD/EtatDeslieux/TestEtatDesLieux.php");
require_once(__DIR__ . "/TestBDD/EtatDeslieux/TestLocataire.php");
require_once(__DIR__ . "/TestBDD/EtatDeslieux/TestLogement.php");
use TestUnitaire\TestBDD\EtatDesLieux\TestEtatDesLieux;
use TestUnitaire\TestBDD\EtatDesLieux\TestLocataire;
use TestUnitaire\TestBDD\EtatDesLieux\TestLogement;
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
            new TestLocataire(),
            new TestElectromenager(),
            new TestElements(),
            new TestPiece(),
            new TestLogement()
        ];
    }


    public function Execute() : string {

        $retour = '<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tests Unitaires</title>
            <link rel="stylesheet" href="../Public/CSS/testUnitaire.css">';
        $retour .= '<h1> Tests Unitaires </h1><br>
        <div class="gridSections ">';

        foreach ($this->tests as $test) {
            $donnees = $test->Execute();

            $retour .= "<section>";
            
            foreach ($donnees as $data) {
                $retour .= $data . "<br>";
            }

            $retour .= "</section>";

        }

        $retour .="</div>";

        return $retour;

    }


}

$tests = new MainTestUnitaire();
echo $tests->Execute();


?>