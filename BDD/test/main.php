<?php

require_once '../Tables/EtatDesLieux/T_EtatDesLieux.php';
require_once '../Tables/EtatDesLieux/EtatDesLieuxImpl.php';
require_once './connexionBase.php';



function main() {
    EtatDesLieux();
}

function EtatDesLieux() {
        // Création d'un nouvel état des lieux
        $EtatDesLieux = new T_EtatDesLieux();

        // exemple d'initialisation mai apres récuperer les infos du formulaire
        $EtatDesLieux->setIdEtatDesLieux(1);
        $EtatDesLieux->setDateEntree(new DateTime('2023-05-01'));
        $EtatDesLieux->setDateSortie(new DateTime('2024-04-30'));
        $EtatDesLieux->setType('sortie');
        $EtatDesLieux->setMedia('photo.jpg');
    
    
        connexionBase::getInstance();// creer la connexion a la bdd
    
        //EnseignantDAOImpl::afficherContenuTable('EtatDesLieux');
        // Insertion du nouvel état des lieux
        EtatDesLieuxImpl::InsertTable($EtatDesLieux);
    
        // Attendre un peu avant d'afficher le contenu de la table (pour s'assurer que l'insertion est terminée)
        sleep(1); // Utiliser sleep pour attendre 1 seconde (équivalent à setTimeout en JS)
        connexionBase::afficherContenuTable('EtatDesLieux');



        // Création d'un nouvel état des lieux
        $EtatDesLieux2 = new T_EtatDesLieux();

        // exemple d'initialisation mai apres récuperer les infos du formulaire
        $EtatDesLieux2->setIdEtatDesLieux(1);
        $EtatDesLieux2->setDateEntree(new DateTime('1980-05-01'));
        $EtatDesLieux2->setDateSortie(new DateTime('2560-04-30'));
        $EtatDesLieux2->setType('entree');
        $EtatDesLieux2->setMedia('video.jpg');


        EtatDesLieuxImpl::updateTable($EtatDesLieux2);

        sleep(1);

        connexionBase::afficherContenuTable('EtatDesLieux');

        connexionBase::closeConnection();
    }

// Exécution de la fonction principale
main();

?>