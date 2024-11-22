<?php
namespace Views\PagesFormulaire;

require_once(__DIR__ . "/../AbstractPage.php");
use Views\AbstractPage;

class PagePartage extends AbstractPage
{
    public function __construct()
    {
        parent::__construct(cssChemin: "../../Public/CSS/Partage.css", nom: "E-Lieu ~ Partage et Export");
    }

    protected function GenerateContent() : string
    {
        return "
            <div class='container'>
                <div class='pdf-container'>
                    <embed id='pdf-embed' src='../../Public/Medias/TP1ANALYSE.pdf?nocache=" . uniqid() . "' width='100%' height='500px' type='application/pdf'/> 
                </div>
                <div class='buttons-container'>
                    <form action=\"./ControllerPartageAnnexe.php\" method=\"POST\">
                    <fieldset class=\"FormualirePartage\">
                        <input type=\"submit\" name=\"TelechargerDOCX\" value=\"Télécharger word\"/>
                        <input type=\"submit\" name=\"TelechargerPDF\" value=\"Télécharger pdf\"/>
                        <input type=\"submit\" name=\"EnvoyerMail\" value=\"Envoyer par mail\"/>
                    </fieldset>
                    </form>
                </div>
            </div>
        ";
    }
}
?>
