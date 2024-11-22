<?php
namespace Views\PagesFormulaire;
use Views\AbstractPage;
require_once(__DIR__ . "/../AbstractPage.php");

class PageEnvoieMail extends AbstractPage
{

    private string $folderPath="";

    public function __construct(string $folderPath)
    {
        $this->folderPath = $folderPath; 
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/formulaire.css",nom:"E-Lieu ~ Formulaire");
    }    

    protected function GenerateContent() : string
    {
        return "<form action='./ControllerEnvoieMail.php' method='POST'>
        <fieldset class=\"FormulaireEnvoieMail\">
        <input type=\"text\" placeholder=\"Adresse Email du destinataire...\" name=\"AdresseEmailDestinataire\" required/>
        <input type=\"text\" placeholder=\"Objet du Mail...\" name=\"ObjetMail\" required/>
        <textarea name=\"CorpsMail\" placeholder=\"Corps du Mail...\" required></textarea>
        <input type=\"hidden\" value=\"".$this->folderPath."\" name=\"PieceJointe\">
        <input type=\"submit\" value=\"Envoyer\"/>
        </fieldset>
        
        </form>"
        ;
    }
}