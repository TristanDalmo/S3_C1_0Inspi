<?php
/**
 * Classe représentant une cuisine.
 */
class T_Cuisine {
    /**
     * id de la cuisine
     * @var int
     */
    private $idCuisine;

    /**
     * id de l'électroménager associé
     * @var int
     */
    private $idElectromenager;

    /**
     * id de la prise de cuisine associée
     * @var int
     */
    private $idPriseCuisine;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de la cuisine
     * @return int 
     */
    public function getIdCuisine() {
        return $this->idCuisine;
    }

    /**
     * Getter pour l'id de l'électroménager
     * @return int 
     */
    public function getIdElectromenager() {
        return $this->idElectromenager;
    }

    /**
     * Getter pour l'id de la prise de cuisine
     * @return int 
     */
    public function getIdPriseCuisine() {
        return $this->idPriseCuisine;
    }

    /**
     * Setter pour l'id de la cuisine
     * @param int $idCuisine 
     */
    public function setIdCuisine($idCuisine) {
        $this->idCuisine = $idCuisine;
    }

    /**
     * Setter pour l'id de l'électroménager
     * @param int $idElectromenager 
     */
    public function setIdElectromenager($idElectromenager) {
        $this->idElectromenager = $idElectromenager;
    }

    /**
     * Setter pour l'id de la prise de cuisine
     * @param int $idPriseCuisine 
     */
    public function setIdPriseCuisine($idPriseCuisine) {
        $this->idPriseCuisine = $idPriseCuisine;
    }
}