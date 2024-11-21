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

    protected function GenerateContent(): string
    {
        return "
        <div class='container'>
            <div class='pdf-container'>
                <iframe src='../../Public/Medias/TD5.pdf' width='100%' height='500px' title=\"Affichage du PDF Cas d'Utilisation\" referrerpolicy=\"strict-origin-when-cross-origin\"></iframe>
            </div>
            <div class='buttons-container'>
                <form method='POST' action=''>
                    <button type='submit' name='generate_pdf'>Télécharger au format PDF</button>
                </form>
            </div>
        </div>
        ";
    }
}
?>
