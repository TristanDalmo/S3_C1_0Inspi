<?php

namespace Model;

/**
 * Classe représentant les différentes prises d'une pièce
 */
class Prises {
    
    // Id des prises
    private int $idPrises;

    // Description des prises
    private string $description;

    // Nombre de prises
    private int $NombrePrises;

    // État à l'entrée
    private string $etatEntree;

    // État à la sortie
    private string $etatSortie;



    

    /**
     * Get the value of idPrises
     *
     * @return int
     */
    public function getIdPrises(): int
    {
        return $this->idPrises;
    }

    /**
     * Set the value of idPrises
     *
     * @param int $idPrises
     */
    public function setIdPrises(int $idPrises)
    {
        $this->idPrises = $idPrises;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
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
     * Get the value of NombrePrises
     *
     * @return int
     */
    public function getNombrePrises(): int
    {
        return $this->NombrePrises;
    }

    /**
     * Set the value of NombrePrises
     *
     * @param int $NombrePrises
     */
    public function setNombrePrises(int $NombrePrises)
    {
        $this->NombrePrises = $NombrePrises;
    }

    /**
     * Get the value of etatEntree
     *
     * @return string
     */
    public function getEtatEntree(): string
    {
        return $this->etatEntree;
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
        return $this->etatSortie;
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
