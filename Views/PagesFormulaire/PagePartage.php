<?php

namespace Views\PagesFormulaire;
require_once(__DIR__ . "/../AbstractPage.php");
use Views\AbstractPage;


/**
 * Classe de génération de la page de partage d'un état des lieux
 */
class PagePartage extends AbstractPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/Partage.css",nom:"E-Lieu ~ Partage et Export");
    }

    protected function GenerateContent() : string
{
    return "
        <div class='container'>
            <div class='pdf-container'>
                <embed src=\"../../Public/Medias/TP1ANALYSE.pdf\" width=\"100%\" height=\"500px\" type='application/pdf'/>
            </div>
            <div class='buttons-container'>
                <button onclick='action1()'>Imprimer l'état des lieux</button>
                <button onclick='action2()'>Partager par mail</button>
                <button onclick='action3()'>Télécharger au format docx</button>
                <button onclick='action4()'>Télécharger au format PDF</button>
            </div>
        </div>
    ";
}
}

?>