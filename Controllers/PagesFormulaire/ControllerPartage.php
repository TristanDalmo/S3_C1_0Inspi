<?php

namespace Controllers\PagesFormulaire;

use Exception;
require_once(__DIR__ . "/../../Views/PagesFormulaire/PagePartage.php");
use Views\PagesFormulaire\PagePartage;
use Service\MediaService\MediaService;
require_once(__DIR__."/../../Service/Media/MediaService.php");
use RetourMetier\Retour;
require_once(__DIR__."/../../RetourMetier/Retour.php");

/**
 * Classe permettant de créer la page de remplissage du formulaire
 */
class ControllerPartage {

    // Page à initialiser
    private PagePartage $page;

    /**
     * Constructeur du controller de la page
     * @param \Views\PagesFormulaire\PagePartage $page Page à utiliser
     */
    public function __construct(PagePartage $page) {
        $this->page = $page;
    }


    /**
     * Méthode permettant d'afficher le contenu de la page
     * @return string Page web à afficher
     */
    public function index() : string {
        $retour=new Retour();
        $retourMessage = "Le fichier est envoyé avec succès";
        try
        {
            $mediaService = new MediaService();
            if (isset($_FILES['Documents']) && $_FILES['Documents']==null)
            {
                $mediaService->InsertionMedias($_FILES['Documents']);
                
            } 
        }
        catch(Exception $e)
        {
            
            $retourMessage = $e->getMessage();
        }
        $retour->EnvoieRetour($retourMessage);
        return $this->page->GeneratePage();

    }

}

// Création de la page
$controller = new ControllerPartage(new PagePartage());
echo $controller->index();


?>