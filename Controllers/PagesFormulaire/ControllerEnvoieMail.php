<?php
namespace Controllers\PagesFormulaire;
use Exception;
use Views\PagesFormulaire\pageErreur;
use Views\PagesFormulaire\PageSuccesMail;
use Service\EnvoieMailService\MailService;
require_once(__DIR__."/../../Service/EnvoieMailService/MailService.php");
require_once(__DIR__."/../../Views/PagesFormulaire/pageErreur.php");
require_once(__DIR__ . "/../../Views/PagesFormulaire/PageSuccesMail.php");


    class ControllerEnvoieMail
    {
        

        public function __construct() {
            
        }

        public function index() : string {
            $newPage=null;
            try
            {
                if (isset($_POST))
                {
                    $donnees = $_POST;
                    $service = new MailService();
                    $service->EnvoieMail($donnees);
                    $newPage=new PageSuccesMail($_POST['AdresseEmailDestinataire']);
                }
            }
            catch(Exception $e)
            {
                $newPage=new pageErreur($e->getMessage());
            }
            return $newPage->GeneratePage();
    
        }

    }

    $controller = new ControllerEnvoieMail();
    echo $controller->index();