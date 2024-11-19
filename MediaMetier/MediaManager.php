<?php

    namespace MediaMetier;
    require_once(__DIR__ . "/I_MediaManager.php");
    use MediaMetier\I_MediaManager;

    /**
     * Classe permettant l'insertion de médias dans le serveur
     */
    class MediaManager implements I_MediaManager
    {
        public function InsertionMedia(array $donnees) : string
        {
            $retour = "";

            // On vérifie que les documents existent et qu'il s'agit bien d'un tableau
            if (isset($donnees['Documents']) && is_array($donnees['Documents']['name']))
            {
                // Définition du dossier dans lequel on enverra les médias (on utilisera 2 variables aléatoires indépendantes qui rendront le nom du dossier unique)
                $Dossier_Cible = "../../MediasClients/" . time() . uniqid() . "/";
                
                // Crée le dossier si nécessaire
                mkdir(directory: $Dossier_Cible,permissions: 0777,recursive: true);
    
                // Pour tous les médias envoyés dans le formulaire
                foreach ($donnees["Documents"]["name"] as $key => $temp)
                {
                    // On redéfinit le chemin où envoyer le média
                    $Fichier_Cible = $Dossier_Cible . basename(path: $donnees["Documents"]["name"][$key]);
    
                    // Permet de récupérer le type de fichier en minuscule, afin d'éviter des erreurs potentielles
                    $TypeFichier = strtolower(string: pathinfo(path: $Fichier_Cible,flags: PATHINFO_EXTENSION));
    
                    #region Vérifications
    
                    // Vérifie si le fichier existe déjà ou non
                    if (file_exists(filename: $Fichier_Cible)) {
                        $retour = "Le fichier " . $donnees["fileToUpload"]["name"][$key] . " existe déjà, veuillez changer le nom de votre fichier ou en insérer un différent.";
                        break;
                    }
    
                    // Limitation de taille des fichiers (à 40 Mo), on arrête si la limite est dépassée
                    if ($donnees["Documents"]["size"][$key] > 40000000) {
                        $retour = "Le fichier " . $donnees["fileToUpload"]["name"][$key] . " dépasse la limite autorisée (40 Mo).";
                        break;
                    }
    
                    // On vérifie si on insère bien le bon type de fichier (que n'importe quel fichier ne soit pas inséré à la place)
                    $fichiers_autorises = array("jpg","png","jpeg","mp4","mov",);
                    if (!in_array(needle: $TypeFichier,haystack: $fichiers_autorises)) {
                        echo "Le fichier " . $donnees["fileToUpload"]["name"][$key] . " n'est pas dans un format autorisé (jpg, png, jpeg, mp4 ou mov).";
                        break;
                    }
    
                    #endregion
                
                // Upload du fichier et message sur console pour savoir si oui ou non il a été ajouté
                    if (move_uploaded_file(from: $donnees["Documents"]["tmp_name"][$key], to: $Fichier_Cible)) {
                        echo "<script>console.log('Le fichier " . $donnees["Documents"]["name"][$key] . " a bien été ajouté aux documents du serveur')</script>";
                    }
                    else 
                    {
                        echo "<script>console.log('Une erreur s'est produite lors de l'ajout de : " . $donnees["Documents"]["name"][$key]. "')</script>";
                    }
                    
    
                }
            } 
            else
            {
                echo "<script>console.log('Les documents n'ont pas pu être insérés.')</script>";
            }
    
            // Retourne le chemin du fichier pour l'insérer dans la base de données
            return $Dossier_Cible;
        }
    }

?>