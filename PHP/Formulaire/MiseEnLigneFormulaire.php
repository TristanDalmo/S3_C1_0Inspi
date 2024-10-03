<?php

/**
 * Classe permettant de mettre en ligne un formulaire à partir de données entrées
 */
Class MiseEnLigneFormulaire {

    /**
     * Méthode permettant d'insérer les données d'un formulaire dans une Base de Données
     * @return void
     */
    public function InsertionBDD($documents): void {

        ///////////////////////////////
        // Insertion dans la BDD
        ///////////////////////////////

    }

    /**
     * Insertion des médias entrés dans le formulaire s'ils existent
     * @return string Renvoie le chemin du dossier dans lequel on insère les données 
     */
    public function InsertionMedias() : string {

        // Définition du dossier dans lequel on enverra les médias (on utilisera 2 variables aléatoires indépendantes qui rendront le nom du dossier unique)
        $Dossier_Cible = "../../MediasClients/" . time() . uniqid();

        // Pour tous les médias envoyés dans le formulaire
        foreach ($_FILES["Documents"]["name"] as $key => $temp)
        {
            // On redéfinit le chemin où envoyer le média
            $Fichier_Cible = $Dossier_Cible . basename(path: $_FILES["Documents"]["name"][$key]);

            // Permet de récupérer le type de fichier en minuscule, afin d'éviter des erreurs potentielles
            $TypeFichier = strtolower(string: pathinfo(path: $Fichier_Cible,flags: PATHINFO_EXTENSION));

            #region Vérifications

            // Vérifie si le fichier existe déjà ou non
            if (file_exists($Fichier_Cible)) {
                echo "<script>console.log(Le fichier " . $_FILES["fileToUpload"]["name"][$key] . " existe déjà, veuillez changer le nom de votre fichier ou en insérer un différent.)';</script>";
                break;
            }

            // Limitation de taille des fichiers (à 40 Mo), on arrête si la limite est dépassée
            if ($_FILES["Documents"]["size"][$key] > 40000000) {
                echo "<script>console.log('Le fichier " . $_FILES["fileToUpload"]["name"][$key] . " dépasse la limite autorisée (40 Mo). ')</script>";
                break;
            }

            // On vérifie si on insère bien le bon type de fichier (que n'importe quel fichier ne soit pas inséré à la place)
            $fichiers_autorises = array("jpg","png","jpeg","mp4","mov",);
            if (!in_array($TypeFichier,$fichiers_autorises)) {
                echo "<script>console.log('Le fichier " . $_FILES["fileToUpload"]["name"][$key] . " n'est pas dans un format autorisé (jpg, png, jpeg, mp4 ou mov). ')</script>";
                break;
            }

            #endregion
           
           // Upload du fichier et message sur console pour savoir si oui ou non il a été ajouté
            if (move_uploaded_file(from: $_FILES["Documents"]["name"][$key], to: $Fichier_Cible)) {
                echo "<script>console.log('Le fichier " . $_FILES["Documents"]["name"][$key] . " a bien été ajouté aux documents du serveur')</script>";
            }
            else 
            {
                echo "<script>console.log('Une erreur s'est produite lors de l'ajout de : " . $_FILES["Documents"]["name"][$key]. "')</script>";
            }
            

        }

        // Retourne le chemin du fichier pour l'insérer dans la base de données
        return $Dossier_Cible;

    }



    /**
     * Méthode permettant d'agir à partir des données entrées dans un formulaire, ajoutant des données à la Base de Données, ajoutant les médias ajoutés, ...
     * @return void
     */
    public function MiseEnLigne(): void {

        // Insertion des médias du formulaire
        $chemin_documents = $this->InsertionMedias();

        // Insertion dans la Base de Données
        $this->InsertionBDD(documents: $chemin_documents);

    }





}




?>