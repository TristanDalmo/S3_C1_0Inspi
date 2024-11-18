<?php

namespace DAO\Piece;
require_once(__DIR__ . "/I_ElectromenagerDAO.php");
use DAO\Piece\I_ElectromenagerDAO;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__ . "/../../Model/Electromenager.php");
use Model\Electromenager;
use PDO;

/**
 * Classe d'interactions avec la BDD sur la table Électroménager
 */
class ElectromenagerDAO extends BasePDODAO implements I_ElectromenagerDAO {

    public function Create(Electromenager $electromenager) : string
    {
        // Mise en place de la requête
        $requete = "INSERT INTO ELECTROMENAGER(nomElectromenager,description,etatEntree,etatSortie) VALUES (:nomElectromenager,:description,:etatEntree,:etatSortie)";
        $parameters = array(
            "nomElectromenager"=>$electromenager->getNomElectromenager(),
            "description"=>$electromenager->getDescription(),
            "etatEntree"=>$electromenager->getEtatEntree(),
            "etatSortie"=>$electromenager->getEtatSortie()     
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "L'élément électroménager a été ajouté avec succès",
        "Aucun élément électroménager n'a été ajouté",
        "Erreur lors de la tentative d'ajout de l'élément électroménager");

        // Retour de la variable
        return $reponse;
    }


    public function Update(Electromenager $electromenager): string
    {
        // Mise en place de la requête
        $requete = "UPDATE ELECTROMENAGER SET nomElectromenager = :nomElectromenager, description = :description, etatEntree = :etatEntree , etatSortie = :etatSortie WHERE idElectromenager = :idElectromenager";
        $parameters = array(
            "nomElectromenager"=>$electromenager->getNomElectromenager(),
            "description"=>$electromenager->getDescription(),
            "etatEntree"=>$electromenager->getEtatEntree(),
            "etatSortie"=>$electromenager->getEtatSortie(),
            "idElectromenager"=>$electromenager->getIdElectromenager()   
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Élément électroménager mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour l'élément électroménager");

        // Retour de la variable
        return $reponse;
    }

    public function Delete(int $id) : string
    {
        // Mise en place de la requête
        $requete = "DELETE FROM ELECTROMENAGER WHERE idElectromenager = :idElectromenager";
        $parameters = array("idElectromenager"=>$id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "L'élément électroménager a été supprimé avec succès",
        "Aucun élément électroménager n'a été supprimé",
        "Erreur lors de la tentative de suppression de l'élément électroménager");

        // Retour de la variable
        return $reponse;
    }

    public function getById(int $id) : Electromenager{

        // Mise en place de la requête
        $requete = "SELECT * FROM ELECTROMENAGER WHERE idElectromenager = :idElectromenager";
        $parameters = array("idElectromenager" => $id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        $element = null;

        // Si on a bien obtenu une ligne, on retournera un élément électroménager
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $element = new Electromenager();
            $element->hydrate($row);
        }

        // On retourne l'élément
        return $element;


    }


}












?>