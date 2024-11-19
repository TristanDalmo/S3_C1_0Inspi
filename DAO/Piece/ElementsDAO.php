<?php

namespace DAO\Piece;
require_once(__DIR__ . "/I_ElementsDAO.php");
use DAO\Piece\I_ElementsDAO;
require_once(__DIR__ . "/../BasePDODAO.php");
use DAO\BasePDODAO;
require_once(__DIR__ . "/../../Model/Elements.php");
use Model\Elements;
use PDO;

/**
 * Classe d'interactions avec la BDD sur la table Elements
 */
class ElementsDAO extends BasePDODAO implements I_ElementsDAO {

    public function Create(Elements $element) : int
    {
        // Mise en place de la requête
        $requete = "INSERT INTO ELEMENTS(typeElement,description,etatEntree,etatSortie,idpiece) VALUES (:typeElement,:description,:etatEntree,:etatSortie,:idPiece)";
        $parameters = array(
            "typeElement"=>$element->getTypeElement(),
            "description"=>$element->getDescription(),
            "etatEntree"=>$element->getEtatEntree(),
            "etatSortie"=>$element->getEtatSortie(),
            "idPiece"=>$element->getPiece()->getidPiece()          
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "L'élément a été ajouté avec succès",
        "Aucun élément n'a été ajouté",
        "Erreur lors de la tentative d'ajout de l'élément");

        // Variable de retour (id de l'élément inserré)
        $retour = $this->getlastInsertId();
        
        // Retour de la variable
        return $retour;
    }


    public function Update(Elements $element)
    {
        // Mise en place de la requête
        $requete = "UPDATE ELEMENTS SET typeElement = :TypeElement, description = :description, etatEntree = :etatEntree, etatSortie = :etatSortie, idPiece = :idPiece WHERE idElement = :idElement";
        $parameters = array(
            "typeElement"=>$element->getTypeElement(),
            "description"=>$element->getDescription(),
            "etatEntree"=>$element->getEtatEntree(),
            "etatSortie"=>$element->getEtatSortie(),
            "idPiece"=>$element->getPiece()->getidPiece()          
        );

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);        
    
        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "Élément mis à jour avec succès",
        "Aucune modification n'a été effectuée",
        "Impossible de mettre à jour l'élément");
    }

    public function Delete(int $id)
    {
        // Mise en place de la requête
        $requete = "DELETE FROM ELEMENTS WHERE idElement = :idElement";
        $parameters = array("idElement"=>$id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        // Retour d'un message de succès ou non
        $this->verificationResultat($reponse,
        "L'élément a été supprimé avec succès",
        "Aucun élément n'a été supprimé",
        "Erreur lors de la tentative de suppression de l'élément");
    }

    public function getById(int $id) : Elements{

        // Mise en place de la requête
        $requete = "SELECT * FROM ELEMENTS WHERE idElement = :idElement";
        $parameters = array("idElement" => $id);

        // Exécution de la requête
        $reponse = $this->execRequest($requete,$parameters);   

        $element = null;

        // Si on a bien obtenu une ligne, on retournera un élément
        if (($row = $reponse->fetch(PDO::FETCH_ASSOC)) != null) {
            $element = new Elements();
            $element->hydrate($row);
        }

        // On retourne l'élément
        return $element;


    }


}












?>