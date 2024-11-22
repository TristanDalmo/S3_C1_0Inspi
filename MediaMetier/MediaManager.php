<?php

    namespace MediaMetier;

    use Exception;
    require_once(__DIR__ . "/I_MediaManager.php");
    use MediaMetier\I_MediaManager;

    /**
     * Classe permettant l'insertion de médias dans le serveur
     */
    class MediaManager implements I_MediaManager
    {
        public function InsertionMedia(array $donnees, $Dossier_Cible)
        {
            #region Vérification des fichiers
            
          
            foreach ($donnees["name"] as $key => $temp)
            {
                // Fichier cible supposé
                $Fichier_Cible = $Dossier_Cible . basename(path: $donnees["name"][$key]);

                // Si on trouve un fichier de plus de 40 Mo, on arrête tout
                if ($donnees["size"][$key] > 40000000) {
                    throw new Exception("Le fichier est trop volumineux, il doit être inférieur à 40Mo");
                }

                // On récupère le type de fichier
                $TypeFichier = strtolower(string: pathinfo(path: $Fichier_Cible,flags: PATHINFO_EXTENSION));
                
                // On vérifie si on insère bien le bon type de fichier (que n'importe quel fichier ne soit pas inséré à la place)
                $fichiers_autorises = array("jpg","png","jpeg","mp4","mov");
                if (!in_array(needle: $TypeFichier,haystack: $fichiers_autorises)) {
                    throw new Exception("Le fichier " . $donnees["name"][$key] . " n'est pas dans un format autorisé (jpg, png, jpeg, mp4 ou mov).");
                }

                // Vérifie si le fichier existe déjà ou non
                if (file_exists(filename: $Fichier_Cible)) {
                    throw new Exception("Le fichier " . $donnees["name"][$key] . " existe déjà, veuillez changer le nom de votre fichier ou en insérer un différent.");
                }
                    


            }

            #endregion

            #region Insertion 

            // Pour tous les médias envoyés dans le formulaire, on les insère
            foreach ($donnees["name"] as $key => $temp)
            {
                // On redéfinit le chemin où envoyer le média
                $Fichier_Cible = $Dossier_Cible . basename(path: $donnees["name"][$key]);
    
                // Upload du fichier et message sur console pour savoir si oui ou non il a été ajouté
                if (!move_uploaded_file(from: $donnees["tmp_name"][$key], to: $Fichier_Cible)) {
                    throw new Exception("Une erreur s'est produite lors de l'ajout de : " . $donnees["name"][$key]);
                }
    
            }

            #endregion 
    
        }
    }

?>