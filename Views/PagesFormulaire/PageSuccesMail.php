<?php
namespace Views\PagesFormulaire;
use Views\AbstractPage;
require_once(__DIR__ . "/../AbstractPage.php");

class PageSuccesMail extends AbstractPage
{

    private string $adresseEmailDestinataire="";

    public function __construct(string $adresseEmailDestinataire)
    {
        $this->adresseEmailDestinataire = $adresseEmailDestinataire; 
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/menu.css",nom:"E-Lieu ~ Formulaire");
    }    

    protected function GenerateContent() : string
    {
        return "<p id=\"messageErreur\">Envoie du mail réussi à l'adresse Email : ".$this->adresseEmailDestinataire."</p>";
    }
}