<?php

namespace Model;

/**
 * Classe représentant un électroménager.
 */
class Electromenager {
    
    // Id de l'électroménager
    private int $idElectromenager;

    // Nom de l'électroménager
    private string $nomElectromenager;

    // Description de l'électroménager
    private string $description;

    // État de l'entrée
    private string $etatEntree;

    // État de la sortie
    private string $etatSortie;

    /**
     * Getter pour l'id de l'électroménager
     * @return int 
     */
    public function getIdElectromenager() {
        return $this->idElectromenager ?? null;
    }

    /**
     * Getter pour le nom de l'électroménager
     * @return string 
     */
    public function getNomElectromenager() {
        return $this->nomElectromenager ?? null;
    }

    /**
     * Getter pour la description
     * @return string 
     */
    public function getDescription() {
        return $this->description ?? null;
    }

    /**
     * Getter pour l'état à l'entrée
     * @return string 
     */
    public function getEtatEntree() {
        return $this->etatEntree ?? null;
    }

    /**
     * Getter pour l'état à la sortie
     * @return string 
     */
    public function getEtatSortie() {
        return $this->etatSortie ?? null;
    }

    /**
     * Setter pour l'id de l'électroménager
     * @param int $idElectromenager 
     */
    public function setIdElectromenager($idElectromenager) {
        $this->idElectromenager = $idElectromenager;
    }

    /**
     * Setter pour le nom de l'électroménager
     * @param string $nomElectromenager 
     */
    public function setNomElectromenager($nomElectromenager) {
        $this->nomElectromenager = $nomElectromenager;
    }

    /**
     * Setter pour la description
     * @param string $description 
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Setter pour l'état à l'entrée
     * @param string $etatEntree 
     */
    public function setEtatEntree($etatEntree) {
        $this->etatEntree = $etatEntree;
    }

    /**
     * Setter pour l'état à la sortie
     * @param string $etatSortie 
     */
    public function setEtatSortie($etatSortie) {
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
            if (method_exists($this, $method)  && $value != null)
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

}