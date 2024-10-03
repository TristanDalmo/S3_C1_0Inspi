<?php
/**
 * Classe représentant une prise de chambre.
 */
class T_PriseChambre {
    /**
     * id de la prise de chambre
     * @var int
     */
    private $idPriseChambre;

    /**
     * description de la prise de chambre
     * @var string
     */
    private $description;

    /**
     * nombre de prises
     * @var int
     */
    private $NbrPrises;

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
     * Getter pour l'id de la prise de chambre
     * @return int 
     */
    public function getIdPriseChambre() {
        return $this->idPriseChambre;
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
    public function getNbrPrises() {
        return $this->NbrPrises;
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
     * Setter pour l'id de la prise de chambre
     * @param int $idPriseChambre 
     */
    public function setIdPriseChambre($idPriseChambre) {
        $this->idPriseChambre = $idPriseChambre;
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
     * @param int $NbrPrises 
     */
    public function setNbrPrises($NbrPrises) {
        $this->NbrPrises = $NbrPrises;
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