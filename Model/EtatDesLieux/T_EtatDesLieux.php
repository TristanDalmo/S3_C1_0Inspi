<?php
/**
 * Classe représentant un état des lieux.
 */
class T_EtatDesLieux {
    /**
     * id etat des lieux
     * @var int
     */
    private $idEtatDesLieux;
    /**
     * date d'entree
     * @var string
     */
    private $dateEntree;
    /**
     * date de sortie
     * @var string
     */
    private $dateSortie;
    /**
     * type de l'etat des lieux (entree ou sortie)
     * @var string
     */
    private $type;
    /**
     * video ou image associe a l'etat des lieux
     * @var string
     */
    private $media;
    /**
     * id reliant au bailleur
     * @var int
     */
    private $idBailleur;
    /**
     * id reliant au logment
     * @var int
     */
    private $idLogement;

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
     * getter de l'id bailleur
     * @return int
     */
    public function getIdBailleur() {
        return $this->idBailleur;
    }

    /**
     * getter de l'id logement 
     * @return int
     */
    public function getIdLogement() {
        return $this->idLogement;
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
    /**
     * setteur de l'id bailleur
     * @param mixed $idBailleur
     * @return void
     */
    public function setIdbailleur($idBailleur) {
        $this->media = $idBailleur;
    }

    public function setIdLogement($idLogement) {
        $this->media = $idLogement;
    }




}