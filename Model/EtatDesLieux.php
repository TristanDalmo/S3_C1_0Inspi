<?php

namespace Model;
require_once(__DIR__ . "/Personne.php");
require_once(__DIR__ . "/TypePiece.php");
use Model\Personne;
use Model\TypePiece;

/**
 * Classe représentant un état des lieux.
 */
class EtatDesLieux {
    
    // Id de l'état des lieux
    private int $idEtatDesLieux;
    
    // Date d'entrée 
    private string $dateEntree;
    
    // Date de sortie
    private string $dateSortie;

    // Type de l'etat des lieux (entree ou sortie)
    private TypePiece $type;

    // Bailleur de l'état des lieux
    private Personne $bailleur;

    // Chemin vers les médias
    private string $media;
    
    // Logement associé à l'état des lieux
    private Logement $logement;    

    /**
     * Get the value of idEtatDesLieux
     */ 
    public function getIdEtatDesLieux()
    {
        return $this->idEtatDesLieux;
    }

    /**
     * Set the value of idEtatDesLieux
     */ 
    public function setIdEtatDesLieux($idEtatDesLieux)
    {
        $this->idEtatDesLieux = $idEtatDesLieux;
    }

    /**
     * Get the value of dateEntree
     */ 
    public function getDateEntree()
    {
        return $this->dateEntree;
    }

    /**
     * Set the value of dateEntree
     */ 
    public function setDateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;
    }

    /**
     * Get the value of dateSortie
     */ 
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set the value of dateSortie
     */ 
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */ 
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the value of bailleur
     */ 
    public function getBailleur()
    {
        return $this->bailleur;
    }

    /**
     * Set the value of bailleur
     */ 
    public function setBailleur($bailleur)
    {
        $this->bailleur = $bailleur;
    }

    /**
     * Get the value of media
     */ 
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set the value of media
     */ 
    public function setMedia($media)
    {
        $this->media = $media;
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
}