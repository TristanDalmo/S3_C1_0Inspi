<?php
/**
 * Classe représentant un électroménager.
 */
class T_Electromenager {
    /**
     * id de l'électroménager
     * @var int
     */
    private $idElectromenager;

    /**
     * nom de l'électroménager
     * @var string
     */
    private $nomElectromenager;

    /**
     * description de l'électroménager
     * @var string
     */
    private $description;

    /**
     * état à l'entrée
     * @var string
     */
    private $etatEntree;

    /**
     * état à la sortie
     * @var string
     */
    private $etatSortie;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de l'électroménager
     * @return int 
     */
    public function getIdElectromenager() {
        return $this->idElectromenager;
    }

    /**
     * Getter pour le nom de l'électroménager
     * @return string 
     */
    public function getNomElectromenager() {
        return $this->nomElectromenager;
    }

    /**
     * Getter pour la description
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Getter pour l'état à l'entrée
     * @return string 
     */
    public function getEtatEntree() {
        return $this->etatEntree;
    }

    /**
     * Getter pour l'état à la sortie
     * @return string 
     */
    public function getEtatSortie() {
        return $this->etatSortie;
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
}