<?php
/**
 * Classe représentant un état des lieux.
 */
class EtatDesLieux {
    private $idEtatDesLieux;
    private $dateEntree;
    private $dateSortie;
    private $type;
    private $media;

    /**
     * constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * getteur id
     * @return int id
     */
    public function getIdEtatDesLieux() {
        return $this->idEtatDesLieux;
    }

    /**
     * getter date d'entrée
     * @return DateTime date d'entrée.
     */
    public function getDateEntree() {
        return $this->dateEntree;
    }

    /**
     * getter date de sortie
     * @return DateTime date de sortie.
     */
    public function getDateSortie() {
        return $this->dateSortie;
    }

    /**
     * getter type
     * @return string Le type d'état des lieux.
     */
    public function getType() {
        return $this->type;
    }

    /**
     * getter média
     * @return string le média
     */
    public function getMedia() {
        return $this->media;
    }

    /**
     * setter id
     * @param int $idEtatDesLieux id
     */
    public function setIdEtatDesLieux($idEtatDesLieux) {
        $this->idEtatDesLieux = $idEtatDesLieux;
    }

    /**
     * setter d'entrée.
     * @param DateTime $dateEntree date d'entrée.
     */
    public function setDateEntree(DateTime $dateEntree) {
        $this->dateEntree = $dateEntree;
    }

    /**
     * setter date de sortie.
     * @param DateTime $dateSortie date de sortie.
     */
    public function setDateSortie(DateTime $dateSortie) {
        $this->dateSortie = $dateSortie;
    }

    /**
     * setter type
     * @param string $type type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * setter média
     * @param string $media média
     */
    public function setMedia($media) {
        $this->media = $media;
    }
}