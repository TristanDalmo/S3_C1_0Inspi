<?php

require_once '../Tables/EtatDesLieux/T_EtatDesLieux.php';
require_once '../Tables/EtatDesLieux/EtatDesLieuxImpl.php';
require_once '../../PHP/Formulaire/MiseEnLigneFormulaire.php';
require_once '../Tables/Chambre/T_Chambre.php';
require_once '../Interactions/Chambre/ChambreImpl.php';
require_once '../Interactions/Cuisine/CuisineImpl.php';
require_once '../Tables/Cuisine/T_Cuisine.php';




function main() {
    EtatDesLieux();
    Chambre();
    Cuisine();
}

function EtatDesLieux() {
        // Création d'un nouvel état des lieux
        $EtatDesLieux = new T_EtatDesLieux();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dateEntree = $_POST['fDate'];
            
            // Conversion
            $dateEntreeObj = new DateTime($dateEntree);

            $dateSortie = $_POST['fDateS'];
            
            // Conversion
            $dateSortieObj = new DateTime($dateSortie);

            $type = $_POST['fPermis'];

        }

        // exemple d'initialisation mai apres récuperer les infos du formulaire
        //$EtatDesLieux->setIdEtatDesLieux(1);
        $EtatDesLieux->setDateEntree($dateEntreeObj);
        $EtatDesLieux->setDateSortie($dateSortieObj);
        $EtatDesLieux->setType($type);
        //$EtatDesLieux->setMedia((new MiseEnLigneFormulaire())->InsertionMedias());
        echo '<br>';
        //echo (new MiseEnLigneFormulaire())->InsertionMedias();
        EtatDesLieuxImpl::init();// creer la connexion a la bdd
    
        //EnseignantDAOImpl::afficherContenuTable('EtatDesLieux');
        // Insertion du nouvel état des lieux
        EtatDesLieuxImpl::InsertTable($EtatDesLieux);
    
        // Attendre un peu avant d'afficher le contenu de la table (pour s'assurer que l'insertion est terminée)
        sleep(1); // Utiliser sleep pour attendre 1 seconde (équivalent à setTimeout en JS)
        EtatDesLieuxImpl::afficherContenuTable('EtatDesLieux');

        EtatDesLieuxImpl::closeConnection();
    }


    function Chambre():void{
        // Création d'une nouvelle chambre
    $chambre = new T_Chambre();

    // Initialisation des données de la chambre
    $chambre->setIdChambre(1);
    $chambre->setIdPriseChambre(101);

    ChambreImpl::init(); // Crée la connexion à la base de données

    // Insertion de la nouvelle chambre
    ChambreImpl::insertTable($chambre);

    // Attendre un peu avant d'afficher le contenu de la table
    sleep(1);
    ChambreImpl::afficherContenuTable('Chambre');

    // Création d'une autre chambre pour la mise à jour
    $chambre2 = new T_Chambre();
    $chambre2->setIdChambre(1);
    $chambre2->setIdPriseChambre(102);

    // Mise à jour de la chambre
    ChambreImpl::updateTable($chambre2);

    sleep(1);

    // Affichage du contenu de la table après la mise à jour
    ChambreImpl::afficherContenuTable('Chambre');

    ChambreImpl::closeConnection();
}

    function Cuisine(){
        /*
        // Création d'un nouvel état des lieux
        $cuisine = new T_Cuisine();

        // exemple d'initialisation mai apres récuperer les infos du formulaire
        //$EtatDesLieux->setMedia((new MiseEnLigneFormulaire())->InsertionMedias());
        echo '<br>';
        //echo (new MiseEnLigneFormulaire())->InsertionMedias();
        CuisineImpl::init();// creer la connexion a la bdd
    
        //EnseignantDAOImpl::afficherContenuTable('EtatDesLieux');
        // Insertion du nouvel état des lieux
        CuisineImpl::InsertTable($cuisine);
    
        // Attendre un peu avant d'afficher le contenu de la table (pour s'assurer que l'insertion est terminée)
        sleep(1); // Utiliser sleep pour attendre 1 seconde (équivalent à setTimeout en JS)
        CuisineImpl::afficherContenuTable('Cuisine');

        CuisineImpl::closeConnection();      
        */
    }


main();

?>