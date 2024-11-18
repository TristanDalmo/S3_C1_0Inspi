<?php
/**
 * Classe représentant un logement.
 */
class T_Logement {
    /**
     * id du logement
     * @var int
     */
    private $idLogement;

    /**
     * type de logement
     * @var string
     */
    private $type;

    /**
     * surface du logement
     * @var float
     */
    private $surface;

    /**
     * nombre de pièces
     * @var int
     */
    private $nbPiece;

    /**
     * adresse du logement
     * @var string
     */
    private $adresse;

    /**
     * id de la première salle de bain
     * @var int
     */
    private $idSalledeBain1;

    /**
     * id de la deuxième salle de bain
     * @var int
     */
    private $idSalledeBain2;

    /**
     * id de la cuisine
     * @var int
     */
    private $idCuisine;

    /**
     * id de la première chambre
     * @var int
     */
    private $idChambre1;

    /**
     * id de la deuxième chambre
     * @var int
     */
    private $idChambre2;

    /**
     * id de la troisième chambre
     * @var int
     */
    private $idChambre3;

    /**
     * id du premier WC
     * @var int
     */
    private $idWc1;

    /**
     * id du deuxième WC
     * @var int
     */
    private $idWc2;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id du logement
     * @return int 
     */
    public function getIdLogement() {
        return $this->idLogement;
    }

    /**
     * Getter pour le type de logement
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Getter pour la surface
     * @return float 
     */
    public function getSurface() {
        return $this->surface;
    }

    /**
     * Getter pour le nombre de pièces
     * @return int 
     */
    public function getNbPiece() {
        return $this->nbPiece;
    }

    /**
     * Getter pour l'adresse
     * @return string 
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Getter pour l'id de la première salle de bain
     * @return int 
     */
    public function getIdSalledeBain1() {
        return $this->idSalledeBain1;
    }

    /**
     * Getter pour l'id de la deuxième salle de bain
     * @return int 
     */
    public function getIdSalledeBain2() {
        return $this->idSalledeBain2;
    }

    /**
     * Getter pour l'id de la cuisine
     * @return int 
     */
    public function getIdCuisine() {
        return $this->idCuisine;
    }

    /**
     * Getter pour l'id de la première chambre
     * @return int 
     */
    public function getIdChambre1() {
        return $this->idChambre1;
    }

    /**
     * Getter pour l'id de la deuxième chambre
     * @return int 
     */
    public function getIdChambre2() {
        return $this->idChambre2;
    }

    /**
     * Getter pour l'id de la troisième chambre
     * @return int 
     */
    public function getIdChambre3() {
        return $this->idChambre3;
    }

    /**
     * Getter pour l'id du premier WC
     * @return int 
     */
    public function getIdWc1() {
        return $this->idWc1;
    }

    /**
     * Getter pour l'id du deuxième WC
     * @return int 
     */
    public function getIdWc2() {
        return $this->idWc2;
    }

    /**
     * Setter pour l'id du logement
     * @param int $idLogement 
     */
    public function setIdLogement($idLogement) {
        $this->idLogement = $idLogement;
    }

    /**
     * Setter pour le type de logement
     * @param string $type 
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * Setter pour la surface
     * @param float $surface 
     */
    public function setSurface($surface) {
        $this->surface = $surface;
    }

    /**
     * Setter pour le nombre de pièces
     * @param int $nbPiece 
     */
    public function setNbPiece($nbPiece) {
        $this->nbPiece = $nbPiece;
    }

    /**
     * Setter pour l'adresse
     * @param string $adresse 
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    /**
     * Setter pour l'id de la première salle de bain
     * @param int $idSalledeBain1 
     */
    public function setIdSalledeBain1($idSalledeBain1) {
        $this->idSalledeBain1 = $idSalledeBain1;
    }

    /**
     * Setter pour l'id de la deuxième salle de bain
     * @param int $idSalledeBain2 
     */
    public function setIdSalledeBain2($idSalledeBain2) {
        $this->idSalledeBain2 = $idSalledeBain2;
    }

    /**
     * Setter pour l'id de la cuisine
     * @param int $idCuisine 
     */
    public function setIdCuisine($idCuisine) {
        $this->idCuisine = $idCuisine;
    }

    /**
     * Setter pour l'id de la première chambre
     * @param int $idChambre1 
     */
    public function setIdChambre1($idChambre1) {
        $this->idChambre1 = $idChambre1;
    }

    /**
     * Setter pour l'id de la deuxième chambre
     * @param int $idChambre2 
     */
    public function setIdChambre2($idChambre2) {
        $this->idChambre2 = $idChambre2;
    }

    /**
     * Setter pour l'id de la troisième chambre
     * @param int $idChambre3 
     */
    public function setIdChambre3($idChambre3) {
        $this->idChambre3 = $idChambre3;
    }

    /**
     * Setter pour l'id du premier WC
     * @param int $idWc1 
     */
    public function setIdWc1($idWc1) {
        $this->idWc1 = $idWc1;
    }

    /**
     * Setter pour l'id du deuxième WC
     * @param int $idWc2 
     */
    public function setIdWc2($idWc2) {
        $this->idWc2 = $idWc2;
    }
}