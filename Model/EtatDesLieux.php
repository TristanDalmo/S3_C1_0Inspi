<?php

namespace Model;
require_once(__DIR__ . "/Personne.php");
require_once(__DIR__ . "/TypePiece.php");
use Model\Personne;

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
    private string $type;

    // Bailleur de l'état des lieux
    private Personne $bailleur;

    // Chemin vers les médias
    private string $media;
    
    // Logement associé à l'état des lieux
    private Logement $logement;    

    public function __construct(){
        $this->bailleur = new Personne();
        $this->logement = new Logement();
    }

    /**
     * Get the value of idEtatDesLieux
     */ 
    public function getIdEtatDesLieux()
    {
        return $this->idEtatDesLieux ?? null;
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
        return $this->dateEntree ?? null;
    }

    /**
     * Set the value of dateEntree
     */ 
    public function setdateEntree($dateEntree)
    {
        $this->dateEntree = $dateEntree;
    }

    /**
     * Get the value of dateSortie
     */ 
    public function getDateSortie()
    {
        return $this->dateSortie ?? null;
    }

    /**
     * Set the value of dateSortie
     */ 
    public function setdateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type ?? null;
    }

    /**
     * Set the value of type
     */ 
    public function setType($type): void
    {
        $this->type=$type;
    }

    /**
     * Get the value of bailleur
     */ 
    public function getBailleur()
    {
        return $this->bailleur ?? null;
    }

    /**
     * Set the value of bailleur
     */ 
    public function setidPersonne($bailleur)
    {
        //$this->bailleur = $bailleur;
        if (is_int($bailleur)) {
            $this->bailleur=new Personne();
            $this->bailleur->setIdPersonne($bailleur);
        }
        else if($bailleur instanceof Personne){
            $this->bailleur=$bailleur;
        }
    }

    /**
     * Get the value of media
     */ 
    public function getMedia()
    {
        return $this->media ?? null;
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
        return $this->logement ?? null;
    }

    /**
     * Set the value of logement
     */ 
    public function setidLogement($logement)
    {
        if (is_int($logement)) {
            $this->logement=new Logement();
            $this->logement->setIdLogement($logement);
        }
        else if($logement instanceof Logement){
            $this->logement=$logement;
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
            if (method_exists($this, $method) && $value != null)
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }
}