<?php

namespace Model;

/**
 * Type de pièce d'un logement
 */
class TypePiece {

    // Identifiant unique du type de pièce
    private int $idTypePiece;

    // Type de pièce
    private string $typePiece;

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
            if (method_exists($this, $method) && $value != null)
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of idTypePiece
     */ 
    public function getIdTypePiece()
    {
        return $this->idTypePiece;
    }

    /**
     * Set the value of idTypePiece
     *
     * @return  self
     */ 
    public function setIdTypePiece($idTypePiece)
    {
        $this->idTypePiece = $idTypePiece;

        return $this;
    }

    /**
     * Get the value of typePiece
     */ 
    public function getTypePiece()
    {
        return $this->typePiece;
    }

    /**
     * Set the value of typePiece
     *
     * @return  self
     */ 
    public function setTypePiece($typePiece)
    {
        $this->typePiece = $typePiece;

        return $this;
    }
}








?>