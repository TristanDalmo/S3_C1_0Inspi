<?php 

    require_once(__DIR__ . "/../../Views/PagesFormulaire/PageEnvoieMail.php");
    use Views\PagesFormulaire\PageEnvoieMail;

    class ControllerTestEnvoie
    {

        private PageEnvoieMail $page;

        public function __construct(PageEnvoieMail $page) {
            $this->page = $page;
        }

        public function index() : string {

            return $this->page->GeneratePage();
    
        }

    }

    $controller = new ControllerTestEnvoie(new PageEnvoieMail("/../../MediasClients/DUTRIONJules.pdf"));
    echo $controller->index();