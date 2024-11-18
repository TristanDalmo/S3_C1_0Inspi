<?php
/**
 * Classe représentant une chambre.
 */
class T_Chambre {
    /**
     * @var int
     */
    private $idChambre;
    /** 
     * @var int cle etrangere permettant d'acceder au prise de la chambre
     */ 
    private $idPriseChambre;

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


    /**
     * Getter pour l'id des prise de la chambre
     * @return int L'idPriseChambre
     */
    public function getIdPriseChambre() {
        return $this->idPriseChambre;
    }

    /**
     * Setter pour l'id des prise de la chambre
     * @param int $idPriseChambre L'idPriseChambre
     */
    public function setIdPriseChambre($idPriseChambre) {
        $this->idPriseChambre = $idPriseChambre;
    }
}