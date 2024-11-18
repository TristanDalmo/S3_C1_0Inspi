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
     *
     * @return int
     */
    public function getIdPiece(): int
    {
        return $this->idPiece;
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
     *
     * @return ?Prises
     */
    public function getPrises(): ?Prises
    {
        return $this->prises;
    }

    /**
     * Set the value of prises
     *
     * @param ?Prises $prises
     */
    public function setPrises(?Prises $prises)
    {
        $this->prises = $prises;
    }

    /**
     * Get the value of electromenager
     *
     * @return ?Electromenager
     */
    public function getElectromenager(): ?Electromenager
    {
        return $this->electromenager;
    }

    /**
     * Set the value of electromenager
     *
     * @param ?Electromenager $electromenager
     */
    public function setElectromenager(?Electromenager $electromenager)
    {
        $this->electromenager = $electromenager;
    }

    /**
     * Get the value of typePiece
     *
     * @return TypePiece
     */
    public function getTypePiece(): TypePiece
    {
        return $this->typePiece;
    }

    /**
     * Set the value of typePiece
     *
     * @param TypePiece $typePiece
     */
    public function setTypePiece(TypePiece $typePiece)
    {
        $this->typePiece = $typePiece;
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
            if (method_exists($this, $method))
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
        return $this->logement;
    }

    /**
     * Set the value of logement
     */ 
    public function setLogement($logement)
    {
        $this->logement = $logement;
    }
}