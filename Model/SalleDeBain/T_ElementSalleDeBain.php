<?php
/**
 * Classe représentant un élément de salle de bain.
 */
class T_ElementSalleDeBain {
    /**
     * id de l'élément de la salle de bain
     * @var int
     */
    private $idElementSalleDeBain;

    /**
     * description de l'élément de la salle de bain
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
     * id de la salle de bain associée
     * @var int
     */
    private $idSalledeBain;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de l'élément de salle de bain
     * @return int 
     */
    public function getIdElementSalleDeBain() {
        return $this->idElementSalleDeBain;
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
     * Getter pour l'id de la salle de bain
     * @return int 
     */
    public function getIdSalledeBain() {
        return $this->idSalledeBain;
    }

    /**
     * Setter pour l'id de l'élément de salle de bain
     * @param int $idElementSalleDeBain 
     */
    public function setIdElementSalleDeBain($idElementSalleDeBain) {
        $this->idElementSalleDeBain = $idElementSalleDeBain;
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
     * Setter pour l'id de la salle de bain
     * @param int $idSalledeBain 
     */
    public function setIdSalledeBain($idSalledeBain) {
        $this->idSalledeBain = $idSalledeBain;
    }
}