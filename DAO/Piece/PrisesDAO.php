<?php

namespace DAO\Piece;
require_once(__DIR__ . "/I_PrisesDAO.php");
use DAO\Piece\I_PrisesDAO;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__ . "/../../Model/Prises.php");
use Model\Prises;
use PDO;

/**
 * Classe d'interactions avec la BDD sur la table Prises
 */
class PrisesDAO extends BasePDODAO implements I_PrisesDAO {

    public function Create(Prises $prises) : string
    {
        // Mise en place de la requête
        $requete = "INSERT INTO PRISES(description,nombrePrises,etatEntree,etatSortie) VALUES (:description,:nombrePrises,:etatEntree,:etatSortie)";
        $parameters = array(
            "description"=>$prises->getDescription(),
            "nombrePrises"=>$prises->getNombrePrises(),
            "etatEntree"=>$prises->getEtatEntree(),
            "etatSortie"=>$prises->getEtatSortie()     
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Les prises ont été ajoutées avec succès",
        "Aucune prise n'a été ajouté",
        "Erreur lors de la tentative d'ajout des prises");

        // Retour de la variable
        return $reponse;
    }


    public function Update(Prises $prises): string
    {
        // Mise en place de la requête
        $requete = "UPDATE PRISES SET description = :description, nombrePrises = :nombrePrises, etatEntree = :etatEntree , etatSortie = :etatSortie WHERE idPrise = :idPrise";
        $parameters = array(
            "description"=>$prises->getDescription(),
            "nombrePrises"=>$prises->getNombrePrises(),
            "etatEntree"=>$prises->getEtatEntree(),
            "etatSortie"=>$prises->getEtatSortie(),
            "idPrise"=>$prises->getIdPrises()       
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "Prises mises à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour les prises");

        // Retour de la variable
        return $reponse;
    }

    public function Delete(int $id) : string
    {
        // Mise en place de la requête
        $requete = "DELETE FROM PRISES WHERE idPrise = :idPrise";
        $parameters = array("idPrise"=>$id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        // Retour d'un message de succès ou non
        $reponse = $this->verificationResultat($reponse,
        "L'ensemble de prises a été supprimé avec succès",
        "Aucun ensemble de prises n'a été supprimé",
        "Erreur lors de la tentative de suppression des prises");

        // Retour de la variable
        return $reponse;
    }

    public function getById(int $id) : Prises{

        // Mise en place de la requête
        $requete = "SELECT * FROM PRISES WHERE idPrise = :idPrise";
        $parameters = array("idPrise" => $id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        $prises = null;

        // Si on a bien obtenu une ligne, on retournera un élément électroménager
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $prises = new Prises();
            $prises->hydrate($row);
        }

        // On retourne l'élément
        return $prises;


    }


}












?>