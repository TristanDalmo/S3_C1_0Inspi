<?php

namespace Service\EnvoieMailService;
use EnvoieMailMetier\EnvoieMail;
require_once(__DIR__."/../../EnvoieMailMetier/EnvoieMail.php");
use Service\EnvoieMailService\I_MailService;
require_once(__DIR__."/I_MailService.php");


class MailService implements I_MailService
{
    public function EnvoieMail(array $donnees)
    {
        $envoieMail = new EnvoieMail();
        $envoieMail->EnvoieMail($donnees);
    }
}