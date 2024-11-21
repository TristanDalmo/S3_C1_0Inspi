<?php
namespace Views\PagesFormulaire;
use Views\AbstractPage;
require_once(__DIR__ . "/../AbstractPage.php");

class pageErreur extends AbstractPage
{

    private string $messageErreur="";

    public function __construct(string $messageErreur)
    {
        $this->messageErreur = $messageErreur; 
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/formulaire.css",nom:"E-Lieu ~ Formulaire");
    }    

    protected function GenerateContent() : string
    {
        return "<form action='ControllerEnvoieMail.php' method='POST'>
        <fieldset class=\"FormulaireEnvoieMail\">
        <input type=\"text\" placeholder=\"Adresse Email du destinataire...\" name=\"adresseEmailDestinataire\">
        <input type=\"text\" placeholder=\"Objet du Mail...\" name=\"ObjetMail\"
        <textarea class=\"objectText\" placeholder=\"Corps du Mail...\"></textarea>
        </fieldset>
        <input=\"submit\" value=\"Envoyer\">
        </form>"
        ;
    }
}