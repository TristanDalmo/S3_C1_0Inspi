<?php
/**
 * Classe représentant un WC.
 */
class T_Wc {
    /**
     * Summary of idWc
     * @var int
     */
    private $idWc;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id du WC
     * @return int L'id du WC
     */
    public function getIdWc() {
        return $this->idWc;
    }

    /**
     * Setter pour l'id du WC
     * @param int $idWc L'id du WC
     */
    public function setIdWc($idWc) {
        $this->idWc = $idWc;
    }
}