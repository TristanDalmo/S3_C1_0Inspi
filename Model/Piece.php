<?php

namespace Model;
require_once(__DIR__ . "/Prises.php");
require_once(__DIR__ . "/TypePiece.php");
require_once(__DIR__ . "/Electromenager.php");
require_once(__DIR__ . "/Logement.php");
use Model\Prises;
use Model\TypePiece;
use Model\Electromenager;
use Model\Logement;

/**
 * Classe représentant une pièce d'un logement.
 */
class Piece {
    
    // Identifiant unique de la pièce
    private int $idPiece;

    // Prises de la pièce
    private ?Prises $prises;

    // Electroménager de la pièce
    private ?Electromenager $electromenager;

    // Type de pièce
    private TypePiece $typePiece;

    // Logement contenant la pièce
    private Logement $logement;

    /**
     * Get the value of idPiece
     */
    public function getIdPiece()
    {
        return $this->idPiece ?? null;
    }

    /**
     * Set the value of idPiece
     *
     * @param int $idPiece
     */
    public function setIdPiece(int $idPiece)
    {
        $this->idPiece = $idPiece;
    }

    /**
     * Get the value of prises
     */
    public function getPrises()
    {
        return $this->prises ?? null;
    }

    /**
     * Set the value of prises
     */
    public function setidPrise($prises)
    {
        if (is_int($prises)) {
            $this->prises=new Prises();
            $this->prises->setIdPrises($prises);
        }
        else if($prises instanceof Prises){
            $this->prises=$prises;
        }
    }

    /**
     * Get the value of electromenager
     *
     * @return ?Electromenager
     */
    public function getElectromenager(): ?Electromenager
    {
        return $this->electromenager ?? null;
    }

    /**
     * Set the value of electromenager
     */
    public function setIdElectromenager($electromenager)
    {
        if (is_int($electromenager))
        {
            $this->electromenager = new Electromenager();
            $this->electromenager->setIdElectromenager($electromenager);
        }
        else if($electromenager instanceof Electromenager){
            $this->electromenager = $electromenager;
        }        
    }

    /**
     * Get the value of typePiece
     */
    public function getTypePiece()
    {
        return $this->typePiece ?? null;
    }

    /**
     * Set the value of typePiece
     */
    public function setidTypePiece($typePiece)
    {
        if (is_int($typePiece))
        {
            $this->typePiece= new TypePiece();
            $this->typePiece->setIdTypePiece($typePiece);
        }
        else if ($typePiece instanceof TypePiece){
            $this->typePiece = $typePiece;
        }
    }


    /**
     * Méthode d'hydratation d'une classe
     * @param array $donnees Données à intégrer
     * @return void
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            
            // Si le setter correspondant existe.
            if (method_exists($this, $method)&& $value != null)
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of logement
     */ 
    public function getLogement()
    {
        return $this->logement ?? null;
    }

    /**
     * Set the value of logement
     */ 
    public function setidLogement($logement)
    {
        if (is_int($logement)) {
            $this->logement = new Logement();
            $this->logement->setIdLogement($logement);
        }
        else if ($logement instanceof Logement){
            $this->logement = $logement;
        }
        
    }
}