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
                    <button onclick='action1()'>Imprimer l'état des lieux</button>
                    <button onclick='action2()'>Partager par mail</button>
                    <button onclick='action3()'>Télécharger au format docx</button>
                    <button onclick='action4()'>Télécharger au format PDF</button>
                </div>
            </div>

            <script>
                const currentUrl = window.location.href;

                if (!sessionStorage.getItem('redirected')) {
                    sessionStorage.setItem('redirected', 'true'); // Marque la redirection comme effectuée
                    window.location.href = currentUrl; // Redirige l'utilisateur vers l'URL exacte
                } else {
                    sessionStorage.removeItem('redirected'); // Réinitialise le marqueur pour les visites futures
                }
            </script>
        ";
    }
}
?>
