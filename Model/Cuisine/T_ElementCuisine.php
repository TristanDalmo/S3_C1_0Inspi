<?php
/**
 * Classe représentant un élément de cuisine.
 */
class T_ElementCuisine {
    /**
     * id de l'élément de cuisine
     * @var int
     */
    private $idElementCuisine;

    /**
     * description de l'élément de cuisine
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
     * id de la cuisine associée
     * @var int
     */
    private $idCuisine;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de l'élément de cuisine
     * @return int 
     */
    public function getIdElementCuisine() {
        return $this->idElementCuisine;
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
     * Getter pour l'id de la cuisine
     * @return int 
     */
    public function getIdCuisine() {
        return $this->idCuisine;
    }

    /**
     * Setter pour l'id de l'élément de cuisine
     * @param int $idElementCuisine 
     */
    public function setIdElementCuisine($idElementCuisine) {
        $this->idElementCuisine = $idElementCuisine;
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
     * Setter pour l'id de la cuisine
     * @param int $idCuisine 
     */
    public function setIdCuisine($idCuisine) {
        $this->idCuisine = $idCuisine;
    }
}