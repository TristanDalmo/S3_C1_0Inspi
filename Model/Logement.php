<?php

namespace Model;

/**
 * Classe représentant un logement.
 */
class Logement {

    // id du logement
    private int $idLogement;

    // Type de logement
    private string $type;

    // Surface du logement
    private float $surface;

    // Nombre de pièces
    private int $nbPiece;

    // Adresse du logement
    private string $adresse;


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

}