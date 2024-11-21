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
        return $this->locataire ?? null;
    }

    /**
     * Set the value of locataire
     */ 
    public function setidPersonne($locataire)
    { 
        if (is_int($locataire))
        {
            $this->locataire= new Personne();
            $this->locataire->setIdPersonne($locataire);
        }
        else if($locataire instanceof Personne) {
            $this->locataire=$locataire;
        }
    }

    /**
     * Get the value of etatDesLieux
     */ 
    public function getEtatDesLieux()
    {
        return $this->etatDesLieux ?? null;
    }

    /**
     * Set the value of etatDesLieux
     */ 
    public function setidEtatDesLieux($etatDesLieux)
    {
        if (is_int($etatDesLieux)) {
            $this->etatDesLieux= new EtatDesLieux();
            $this->etatDesLieux->setIdEtatDesLieux($etatDesLieux);
        }
        else if ($etatDesLieux instanceof EtatDesLieux) {
            $this->etatDesLieux=$etatDesLieux;
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
}





?>