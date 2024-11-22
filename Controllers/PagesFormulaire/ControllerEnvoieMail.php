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
        
        /**
         * C'est le contrstructeur de de classe ControllerEnvoieMail
         */
        public function __construct() {
            
        }


        /**
         * Méthpde permettant d'appeler l'envoie du mail via le service
         * @return string, c'est la nouvelle vue
         */
        public function index() : string {
            $newPage=null;
            try
            {
                if (isset($_POST))
                {
                    $donnees = $_POST;
                    $service = new MailService();
                    $service->EnvoieMail($donnees); //Appelle de la méthode EnvoieMail de la classe MailService
                    $newPage=new PageSuccesMail($_POST['AdresseEmailDestinataire']);
                }
            }
            catch(Exception $e)
            {
                $newPage=new pageErreur($e->getMessage()); //Si quelque chose c'est mal passé lors de l'envoie du mail, alors le programme attrape l'erreur et envoie une vue
            }
            return $newPage->GeneratePage();
    
        }

    }

    $controller = new ControllerEnvoieMail();
    echo $controller->index();