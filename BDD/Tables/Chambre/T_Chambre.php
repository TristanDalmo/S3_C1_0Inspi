<?php
/**
 * Classe représentant une chambre.
 */
class Chambre {
    private $idChambre;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de la chambre
     * @return int L'id de la chambre
     */
    public function getIdChambre() {
        return $this->idChambre;
    }

    /**
     * Setter pour l'id de la chambre
     * @param int $idChambre L'id de la chambre
     */
    public function setIdChambre($idChambre) {
        $this->idChambre = $idChambre;
    }
}