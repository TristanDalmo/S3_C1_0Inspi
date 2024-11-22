<?php

namespace Controllers\PagesFormulaire;
use Views\PagesFormulaire\PageEnvoieMail;
require_once __DIR__."/../../Views/PagesFormulaire/PageEnvoieMail.php";

class ControllerPartageAnnexe
{
    public function __construct() {
    }

    public function index()
    {
        if (isset($_POST))
        {
            if (isset($_POST["EnvoyerMail"]))
            {
                $newPage= new PageEnvoieMail($_POST["PieceJointe"]);
                return $newPage->GeneratePage();
            }
            if (isset($_POST["EnvoyerMail"]))
            {
                
            }
            if (isset($_POST["EnvoyerMail"]))
            {
                
            }
        }
    }
}

$controller = new ControllerPartageAnnexe();
echo $controller->index();