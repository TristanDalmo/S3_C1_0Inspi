<?php

namespace Service\EnvoieMailService;

    interface I_MailService
    {
        public function EnvoieMail(array $donnees);
    }