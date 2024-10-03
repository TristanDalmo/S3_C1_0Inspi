<?php

require_once './EtatDesLieux.php';
require_once './EtatDesLieuxDAOImpl.php';




function main() {
    // Création d'un nouvel état des lieux
    $nouvelEtatDesLieux = new EtatDesLieux();

    // exemple d'initialisation mai apres récuperer les infos du formulaire
    $nouvelEtatDesLieux->setIdEtatDesLieux(1);
    $nouvelEtatDesLieux->setDateEntree(new DateTime('2023-05-01'));
    $nouvelEtatDesLieux->setDateSortie(new DateTime('2024-04-30'));
    $nouvelEtatDesLieux->setType('sortie');
    $nouvelEtatDesLieux->setMedia('photo.jpg');


    EtatDesLieuxDAOImpl::init();// creer la connexion a la bdd

    //EnseignantDAOImpl::afficherContenuTable('EtatDesLieux');
    // Insertion du nouvel état des lieux
    EtatDesLieuxDAOImpl::InsertTable($nouvelEtatDesLieux);

    // Attendre un peu avant d'afficher le contenu de la table (pour s'assurer que l'insertion est terminée)
    sleep(1); // Utiliser sleep pour attendre 1 seconde (équivalent à setTimeout en JS)
    EtatDesLieuxDAOImpl::afficherContenuTable('EtatDesLieux');
    EtatDesLieuxDAOImpl::closeConnection();
}

// Exécution de la fonction principale
main();

?>