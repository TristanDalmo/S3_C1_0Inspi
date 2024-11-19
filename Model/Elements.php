<?php

namespace Model;
require_once(__DIR__ . "/Piece.php");
use Model\Piece;


/**
 * Classe représentant un élément de pièce
 */
class Elements {
    
    // Id de l'élément
    private int $idElement;

    // Type de l'élément
    private string $typeElement;

    // Description de l'élément
    private string $description;

    // État à l'entrée
    private string $etatEntree;

    // État à la sortie
    private string $etatSortie;

    // Pièce associée à l'élément
    private Piece $piece;


    /**
     * Get the value of idElement
     *
     * @return int
     */
    public function getIdElement(): int
    {
        return $this->idElement ?? null;
    }

    /**
     * Set the value of idElement
     *
     * @param int $idElement
     */
    public function setIdElement(int $idElement)
    {
        $this->idElement = $idElement;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description ?? null;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Get the value of etatEntree
     *
     * @return string
     */
    public function getEtatEntree(): string
    {
        return $this->etatEntree ?? null;
    }

    /**
     * Set the value of etatEntree
     *
     * @param string $etatEntree
     */
    public function setEtatEntree(string $etatEntree)
    {
        $this->etatEntree = $etatEntree;
    }

    /**
     * Get the value of etatSortie
     *
     * @return string
     */
    public function getEtatSortie(): string
    {
        return $this->etatSortie ?? null;
    }

    /**
     * Set the value of etatSortie
     *
     * @param string $etatSortie
     */
    public function setEtatSortie(string $etatSortie)
    {
        $this->etatSortie = $etatSortie;
    }

    /**
     * Get the value of piece
     *
     * @return Piece
     */
    public function getPiece(): Piece
    {
        return $this->piece ?? null;
    }

    /**
     * Set the value of piece
     */
    public function setPiece($piece)
    {
        if (is_int($piece))
        {
            $this->piece = new Piece();
            $this->piece->setIdPiece($piece);
        }
        else if ($piece instanceof Piece)
        {
            $this->piece = $piece;
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
     * Get the value of typeElement
     */ 
    public function getTypeElement()
    {
        return $this->typeElement ?? null;
    }

    /**
     * Set the value of typeElement
     */ 
    public function setTypeElement($typeElement)
    {
        $this->typeElement = $typeElement;
    }
}