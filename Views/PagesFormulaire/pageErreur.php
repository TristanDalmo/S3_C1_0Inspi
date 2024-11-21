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
        parent::__construct(cssChemin: "../../Public/CSS/menu.css",nom:"E-Lieu ~ Formulaire");
    }    

    protected function GenerateContent() : string
    {
        return "<p id=\"messageErreur\"><span id=\"erreur\">ERREUR : </span><br>".$this->messageErreur."<br>Veuillez retourner sur la page précédente</p>";
    }
}