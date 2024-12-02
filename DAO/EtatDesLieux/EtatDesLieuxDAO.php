<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__."/../../Model/EtatDesLieux.php");
use Model\EtatDesLieux;
require_once(__DIR__."/I_EtatDesLieuxDAO.php");
use DAO\EtatDesLieux\I_EtatDesLieuxDAO;
use PDO;

/**
 * Classe DAO de la table Etat des lieux
 */
class EtatDesLieuxDAO extends BasePDODAO implements I_EtatDesLieuxDAO {

    public function Create(EtatDesLieux $etatDesLieux): int {
        // On prépare la requête d'insertion
        $requete = "INSERT INTO EtatDesLieux (dateEntree,dateSortie,type,media,commentaire,idPersonne) VALUES (:dateEntree,:dateSortie,:type,:media,:commentaire,:idPersonne)";

        // On prépare les données à insérer
        $donnees = array(
            "dateEntree" => $etatDesLieux->getDateEntree(),
            "dateSortie" => $etatDesLieux->getDateSortie(),
            "type" => $etatDesLieux->getType(),
            "media" => $etatDesLieux->getMedia(),
            "commentaire"=> $etatDesLieux->getCommentaire(),
            "idPersonne"=> $etatDesLieux->getBailleur()->getIdPersonne()
        );

        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "L'état des lieux a été ajouté avec succès",
        "Aucun état des lieux n'a été ajouté",
        "Erreur lors de la tentative d'ajout de l'état des lieux");
    
        // Variable de retour (id de l'élément inserré)
        $retour = $this->getlastInsertId();
        
        // Retour de la variable
        return $retour;
    }
    public function Update(EtatDesLieux $etatDesLieux) {
        $requete = "UPDATE EtatDesLieux SET dateEntree = :dateEntree, dateSortie = :dateSortie, type = :type, media = :media, commentaire = :commentaire, idPersonne = :idPersonne WHERE idEtatDesLieux = :idEtatDesLieux";
        $donnees = array(
            "idEtatDesLieux" => $etatDesLieux->getIdEtatDesLieux(),
            "dateEntree" => $etatDesLieux->getDateEntree(),
            "dateSortie" => $etatDesLieux->getDateSortie(),
            "type" => $etatDesLieux->getType(),
            "media" => $etatDesLieux->getMedia(),
            "commentaire"=> $etatDesLieux->getCommentaire(),
            "idPersonne" => $etatDesLieux->getBailleur()->getIdPersonne()
        );
    
        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "État des lieux mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour l'état des lieux",
        true);
    }

    public function Delete(int $id) {
        $requete = "DELETE FROM EtatDesLieux WHERE idEtatDesLieux = :idEtatDesLieux";
    
        $donnees = array(
            "idEtatDesLieux" => $id
        );
        
        // Exécution de la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "L'état des lieux a été supprimé avec succès",
        "Aucun état des lieux n'a été supprimé",
        "Erreur lors de la tentative de suppression de l'état des lieux");
    }

    public function getById(int $id) : EtatDesLieux {

        // On met en place la requête
        $requete = "SELECT * FROM EtatDesLieux WHERE idEtatDesLieux = :idEtatDesLieux";

        // On exécute la requête
        $reponse = $this->execRequest($requete, array("idEtatDesLieux"=> $id));

        $etatDesLieux = null;

        // Si on a bien obtenu une ligne, on retournera un État des lieux
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $etatDesLieux = new EtatDesLieux();
            $etatDesLieux->hydrate($row);
        }

        // On retourne l'état des lieux
        return $etatDesLieux;
    }


}

?>