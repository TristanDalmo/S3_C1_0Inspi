<?php

namespace Model;
require_once(__DIR__ . "/EtatDesLieux.php");
require_once(__DIR__ . "/Personne.php");
use Model\EtatDesLieux;
use Model\Personne;

class Locataire {

    // Personne locataire d'un état des lieux
    private Personne $locataire;

    // État des lieux associé au locataire
    private EtatDesLieux $etatDesLieux;

    /**
     * Get the value of locataire
     */ 
    public function getLocataire()
    {
        return $this->locataire;
    }

    /**
     * Set the value of locataire
     */ 
    public function setLocataire($locataire)
    {
        $this->locataire = $locataire;
    }

    /**
     * Get the value of etatDesLieux
     */ 
    public function getEtatDesLieux()
    {
        return $this->etatDesLieux;
    }

    /**
     * Set the value of etatDesLieux
     */ 
    public function setEtatDesLieux($etatDesLieux)
    {
        $this->etatDesLieux = $etatDesLieux;
    }
}





?>