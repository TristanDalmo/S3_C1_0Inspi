<?php
/**
 * Classe représentant un élément de chambre.
 */
class T_ElementChambre {
    /**
     * id de l'élément de la chambre
     * @var int
     */
    private $idElementChambre;

    /**
     * description de l'élément de la chambre
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
     * id de la chambre associée
     * @var int
     */
    private $idChambre;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de l'élément de chambre
     * @return int 
     */
    public function getIdElementChambre() {
        return $this->idElementChambre;
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
     * Getter pour l'id de la chambre
     * @return int 
     */
    public function getIdChambre() {
        return $this->idChambre;
    }

    /**
     * Setter pour l'id de l'élément de chambre
     * @param int $idElementChambre 
     */
    public function setIdElementChambre($idElementChambre) {
        $this->idElementChambre = $idElementChambre;
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
     * Setter pour l'id de la chambre
     * @param int $idChambre 
     */
    public function setIdChambre($idChambre) {
        $this->idChambre = $idChambre;
    }
}