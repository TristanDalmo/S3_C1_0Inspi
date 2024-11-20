<?php

namespace DAO\EtatDesLieux;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__."/../../Model/Personne.php");
use Model\Personne;
require_once(__DIR__."/I_PersonneDAO.php");
use DAO\EtatDesLieux\I_PersonneDAO;
use PDO;

/**
 * Classe DAO de la table Personne
 */
class PersonneDAO extends BasePDODAO implements I_PersonneDAO {

    public function Create(Personne $personne): int {
        // On prépare la requête d'insertion
        $requete = "INSERT INTO PERSONNE (civilite, prenom, nom, adresse) VALUES (:civilite, :prenom, :nom, :adresse)";

        // On prépare les données à insérer
        $donnees = array(
            "civilite" => $personne->getCivilite(),
            "prenom" => $personne->getPrenom(),
            "nom" => $personne->getNom(),
            "adresse" => $personne->getAdresse()
        );

        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "La personne a été ajouté avec succès",
        "Aucune personne n'a été ajouté",
        "Erreur lors de la tentative d'ajout de la personne");

        // Variable de retour (id de l'élément inserré)
        $retour = $this->getlastInsertId();
        
        // Retour de la variable
        return $retour;
    }
    
    public function Update(Personne $personne) {

        $requete = "UPDATE PERSONNE SET civilite = :civilite, prenom = :prenom, nom = :nom, adresse = :adresse WHERE idPersonne = :idPersonne";
        $donnees = array(
            "civilite" => $personne->getCivilite(),
            "prenom" => $personne->getPrenom(),
            "nom" => $personne->getNom(),
            "adresse" => $personne->getAdresse(),
            "idPersonne" => $personne->getIdPersonne()
        );
    
        // On exécute la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "Personne mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour la personne");
    }

    public function Delete(int $id) {

        $requete = "DELETE FROM PERSONNE WHERE idPersonne = :idPersonne";
    
        $donnees = array(
            "idPersonne" => $id
        );
        
        // Exécution de la requête
        $reponse = $this->execRequest($requete, $donnees);

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "La personne a été supprimé avec succès",
        "Aucune personne n'a été supprimé",
        "Erreur lors de la tentative de suppression de la personne");
    }

    public function getById(int $id) : Personne {

        // On met en place la requête
        $requete = "SELECT * FROM PERSONNE WHERE idPersonne = :idPersonne";

        // On exécute la requête
        $reponse = $this->execRequest($requete, array("idPersonne"=> $id));

        $personne = null;

        // Si on a bien obtenu une ligne, on retournera une Personne
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $personne = new Personne();
            $personne->hydrate($row);
        }

        // On retourne la personne
        return $personne;
    }


}

?>