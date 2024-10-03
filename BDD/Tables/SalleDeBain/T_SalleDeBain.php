<?php
/**
 * Classe représentant une salle de bain.
 */
class SalleDeBain {
    /**
     * @var int
     */
    private $idSalleDeBain;
    /**
     * @var int id permettant de relier aux prise de la salle de bain
     */
    private $idPriseSalleDeBain;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de la salle de bain
     * @return int L'id de la salle de bain
     */
    public function getIdSalleDeBain() {
        return $this->idSalleDeBain;
    }

    /**
     * Getter pour l'id des prises
     * @return int
     */
    public function getIdPriseSalleDeBain() {
        return $this->idPriseSalleDeBain;
    }

    /**
     * Setter pour l'id de la salle de bain
     * @param int $idSalleDeBain L'id de la salle de bain
     */
    public function setIdSalleDeBain($idSalleDeBain) {
        $this->idSalleDeBain = $idSalleDeBain;
    }

    /**
     * Setter pour l'id des prises de la salle de bain
     * @param int $idSalleDeBain
     */
    public function setIdPriseSalleDeBain($idPriseSalleDeBain) {
        $this->idSalleDeBain = $idPriseSalleDeBain;
    }
}