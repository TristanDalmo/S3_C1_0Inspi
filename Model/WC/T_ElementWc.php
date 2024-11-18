<?php
/**
 * Classe représentant un élément de WC.
 */
class T_ElementWc {
    /**
     * id
     * @var int
     */
    private $idElementWc;
    /**
    * description
     * @var string
     */
    private $description;
    /**
     * etat entrée
     * @var string
     */
    private $etatEntree;
    /**
     * etat sortie
     * @var string
     */
    private $etatSortie;
    /**
     * cle etrangere qui fait reference au WC
     * @var 
     */
    private $idWc;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de l'élément WC
     * @return int L'id de l'élément WC
     */
    public function getIdElementWc() {
        return $this->idElementWc;
    }

    /**
     * Getter pour la description
     * @return string La description de l'élément WC
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Getter pour l'état d'entrée
     * @return string L'état d'entrée
     */
    public function getEtatEntree() {
        return $this->etatEntree;
    }

    /**
     * Getter pour l'état de sortie
     * @return string L'état de sortie
     */
    public function getEtatSortie() {
        return $this->etatSortie;
    }

    /**
     * Getter pour l'id du WC
     * @return int L'id du WC
     */
    public function getIdWc() {
        return $this->idWc;
    }

    /**
     * Setter pour l'id de l'élément WC
     * @param int $idElementWc L'id de l'élément WC
     */
    public function setIdElementWc($idElementWc) {
        $this->idElementWc = $idElementWc;
    }

    /**
     * Setter pour la description
     * @param string $description La description de l'élément WC
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Setter pour l'état d'entrée
     * @param string $etatEntree L'état d'entrée
     */
    public function setEtatEntree($etatEntree) {
        $this->etatEntree = $etatEntree;
    }

    /**
     * Setter pour l'état de sortie
     * @param string $etatSortie L'état de sortie
     */
    public function setEtatSortie($etatSortie) {
        $this->etatSortie = $etatSortie;
    }

    /**
     * Setter pour l'id du WC
     * @param int $idWc L'id du WC
     */
    public function setIdWc($idWc) {
        $this->idWc = $idWc;
    }
}