<?php

require_once '../Tables/EtatDesLieux/T_EtatDesLieux.php';
require_once '../Tables/EtatDesLieux/EtatDesLieuxImpl.php';
require_once '../../PHP/Formulaire/MiseEnLigneFormulaire.php';




function main() {
    EtatDesLieux();
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
        $EtatDesLieux->setIdEtatDesLieux(1);
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

    function WC() {
        // Création d'un nouveau wc
       $Wc = new T_WC();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


          //ne rien faire car l'id est en auto increment

        }

    
       
        echo '<br>';
        
        WcImpl::init();// creer la connexion a la bdd
        WcImpl::InsertTable($Wc);
    
        // Attendre un peu avant d'afficher le contenu de la table (pour s'assurer que l'insertion est terminée)
        sleep(1); // Utiliser sleep pour attendre 1 seconde (équivalent à setTimeout en JS)
        WcImpl::afficherContenuTable('Wc');

        WcImpl::closeConnection();
    }
// Exécution de la fonction principale
main();

?>