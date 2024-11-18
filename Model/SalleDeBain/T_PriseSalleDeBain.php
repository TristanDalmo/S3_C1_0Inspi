<?php
/**
 * Classe représentant une prise de salle de bain.
 */
class T_PriseSalleDeBain {
    /**
     * id de la prise de salle de bain
     * @var int
     */
    private $idPriseSalleDeBain;

    /**
     * description de la prise de salle de bain
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
     * Getter pour l'id de la prise de salle de bain
     * @return int 
     */
    public function getIdPriseSalleDeBain() {
        return $this->idPriseSalleDeBain;
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
     * Setter pour l'id de la prise de salle de bain
     * @param int $idPriseSalleDeBain 
     */
    public function setIdPriseSalleDeBain($idPriseSalleDeBain) {
        $this->idPriseSalleDeBain = $idPriseSalleDeBain;
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