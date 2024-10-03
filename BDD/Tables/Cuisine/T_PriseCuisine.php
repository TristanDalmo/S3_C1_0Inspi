<?php
/**
 * Classe représentant une prise de cuisine.
 */
class T_PriseCuisine {
    /**
     * id de la prise de cuisine
     * @var int
     */
    private $idPriseCuisine;

    /**
     * description de la prise de cuisine
     * @var string
     */
    private $description;

    /**
     * nombre de prises
     * @var int
     */
    private $NombrePrises;

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
     * Getter pour l'id de la prise de cuisine
     * @return int 
     */
    public function getIdPriseCuisine() {
        return $this->idPriseCuisine;
    }

    /**
     * Getter pour la description
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Getter pour le nombre de prises
     * @return int 
     */
    public function getNombrePrises() {
        return $this->NombrePrises;
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
     * Setter pour l'id de la prise de cuisine
     * @param int $idPriseCuisine 
     */
    public function setIdPriseCuisine($idPriseCuisine) {
        $this->idPriseCuisine = $idPriseCuisine;
    }

    /**
     * Setter pour la description
     * @param string $description 
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Setter pour le nombre de prises
     * @param int $NombrePrises 
     */
    public function setNombrePrises($NombrePrises) {
        $this->NombrePrises = $NombrePrises;
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