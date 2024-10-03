<?php
/**
 * Classe représentant une salle de bain.
 */
class SalleDeBain {
    private $idSalleDeBain;

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
     * Setter pour l'id de la salle de bain
     * @param int $idSalleDeBain L'id de la salle de bain
     */
    public function setIdSalleDeBain($idSalleDeBain) {
        $this->idSalleDeBain = $idSalleDeBain;
    }
}