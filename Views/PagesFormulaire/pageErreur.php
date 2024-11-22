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
        parent::__construct(cssChemin: "../../Public/CSS/erreur.css",nom:"E-Lieu ~ Formulaire");
    }    

    protected function GenerateContent() : string
    {
        return "<div id=\"messageErreur\"><span id=\"erreur\">ERREUR : </span><br>
        <p id=\"Message\">".$this->messageErreur."</p>
        <br>
        <p id=\"texteFin\">Veuillez retourner sur la page précédente</p></div>";
    }
}